<?php
require_once 'config.php';

// Get all appointments
try {
    $pdo = getConnection();
    $stmt = $pdo->query("SELECT * FROM appointments ORDER BY created_at DESC");
    $appointments = $stmt->fetchAll();
} catch (Exception $e) {
    die("Error fetching appointments: " . $e->getMessage());
}

// Handle status updates
if ($_POST['action'] ?? '' === 'update_status') {
    $appointment_id = (int)$_POST['appointment_id'];
    $new_status = $_POST['status'];
    
    $allowed_statuses = ['pending', 'confirmed', 'cancelled'];
    if (in_array($new_status, $allowed_statuses)) {
        $stmt = $pdo->prepare("UPDATE appointments SET status = ? WHERE id = ?");
        $stmt->execute([$new_status, $appointment_id]);
        header("Location: admin.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Appointments - Admin Panel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            background: #f8fafc;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            background: #2563eb;
            color: white;
            padding: 2rem;
            margin-bottom: 2rem;
            border-radius: 0.5rem;
        }
        
        .header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #2563eb;
        }
        
        .appointments-table {
            background: white;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        
        th {
            background: #f8fafc;
            font-weight: 600;
            color: #374151;
        }
        
        .status {
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .status.pending {
            background: #fef3c7;
            color: #92400e;
        }
        
        .status.confirmed {
            background: #d1fae5;
            color: #065f46;
        }
        
        .status.cancelled {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .status-form {
            display: inline-block;
        }
        
        .status-select {
            padding: 0.25rem 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.25rem;
            font-size: 0.875rem;
        }
        
        .update-btn {
            background: #2563eb;
            color: white;
            border: none;
            padding: 0.25rem 0.75rem;
            border-radius: 0.25rem;
            cursor: pointer;
            font-size: 0.875rem;
            margin-left: 0.5rem;
        }
        
        .update-btn:hover {
            background: #1d4ed8;
        }
        
        .no-appointments {
            text-align: center;
            padding: 3rem;
            color: #6b7280;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            table {
                font-size: 0.875rem;
            }
            
            th, td {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🦷 Dental Appointments Admin</h1>
            <p>Manage patient appointment requests</p>
        </div>

        <div class="stats">
            <div class="stat-card">
                <div class="stat-number"><?= count($appointments) ?></div>
                <div>Total Appointments</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?= count(array_filter($appointments, fn($a) => $a['status'] === 'pending')) ?></div>
                <div>Pending</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?= count(array_filter($appointments, fn($a) => $a['status'] === 'confirmed')) ?></div>
                <div>Confirmed</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?= count(array_filter($appointments, fn($a) => $a['status'] === 'cancelled')) ?></div>
                <div>Cancelled</div>
            </div>
        </div>

        <div class="appointments-table">
            <?php if (empty($appointments)): ?>
                <div class="no-appointments">
                    <h3>No appointments yet</h3>
                    <p>Appointments will appear here when patients submit the form.</p>
                </div>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Service</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointments as $appointment): ?>
                            <tr>
                                <td><?= htmlspecialchars($appointment['id']) ?></td>
                                <td><?= htmlspecialchars($appointment['first_name'] . ' ' . $appointment['last_name']) ?></td>
                                <td><?= htmlspecialchars($appointment['email']) ?></td>
                                <td><?= htmlspecialchars($appointment['phone']) ?></td>
                                <td><?= ucfirst(htmlspecialchars($appointment['service'])) ?></td>
                                <td><?= htmlspecialchars($appointment['message'] ?: '-') ?></td>
                                <td><?= date('M j, Y g:i A', strtotime($appointment['created_at'])) ?></td>
                                <td>
                                    <span class="status <?= $appointment['status'] ?>">
                                        <?= ucfirst($appointment['status']) ?>
                                    </span>
                                </td>
                                <td>
                                    <form method="POST" class="status-form">
                                        <input type="hidden" name="action" value="update_status">
                                        <input type="hidden" name="appointment_id" value="<?= $appointment['id'] ?>">
                                        <select name="status" class="status-select">
                                            <option value="pending" <?= $appointment['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                            <option value="confirmed" <?= $appointment['status'] === 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                            <option value="cancelled" <?= $appointment['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                        </select>
                                        <button type="submit" class="update-btn">Update</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>