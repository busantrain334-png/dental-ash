function doPost(e) {
  try {
    // Get the active spreadsheet
    const sheet = SpreadsheetApp.getActiveSheet();
    
    // Parse the form data
    const data = JSON.parse(e.postData.contents);
    
    // Get current timestamp
    const timestamp = new Date();
    
    // Prepare the row data
    const rowData = [
      timestamp,
      data.first_name || '',
      data.last_name || '',
      data.email || '',
      data.phone || '',
      data.service || '',
      data.message || '',
      'New' // Default status
    ];
    
    // Add the data to the sheet
    sheet.appendRow(rowData);
    
    // Return success response
    return ContentService
      .createTextOutput(JSON.stringify({
        success: true,
        message: 'Appointment request submitted successfully! We will contact you within 24 hours.',
        timestamp: timestamp.toISOString()
      }))
      .setMimeType(ContentService.MimeType.JSON);
      
  } catch (error) {
    // Return error response
    return ContentService
      .createTextOutput(JSON.stringify({
        success: false,
        message: 'Error submitting appointment request. Please try again or call us directly.',
        error: error.toString()
      }))
      .setMimeType(ContentService.MimeType.JSON);
  }
}

function doGet(e) {
  // Handle GET requests (optional)
  return ContentService
    .createTextOutput(JSON.stringify({
      status: 'Service is running',
      message: 'Dr Ashwin Surana Dental Appointment System'
    }))
    .setMimeType(ContentService.MimeType.JSON);
}