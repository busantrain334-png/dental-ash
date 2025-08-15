# Claude, Netlify & GitHub Integration Setup

## Prerequisites

1. GitHub repository
2. Netlify account
3. Claude API key from Anthropic

## Setup Steps

### 1. GitHub Secrets Configuration

Add these secrets to your GitHub repository (Settings > Secrets and variables > Actions):

- `CLAUDE_API_KEY`: Your Anthropic Claude API key
- `NETLIFY_AUTH_TOKEN`: Your Netlify personal access token
- `NETLIFY_SITE_ID`: Your Netlify site ID

### 2. Netlify Setup

1. Connect your GitHub repository to Netlify
2. Set build command: `npm run build`
3. Set publish directory: `dist`
4. Configure environment variables in Netlify dashboard

### 3. GitHub Actions Workflow

The workflow (`/.github/workflows/claude-netlify-integration.yml`) will:

- Build and test your project
- Run Claude code review
- Deploy to Netlify
- Comment on PRs with preview URLs

### 4. Local Development

1. Copy `.env.example` to `.env`
2. Fill in your API keys and tokens
3. Never commit `.env` to version control

## Workflow Features

- **Automatic deployment** on push to main/master
- **Preview deployments** for pull requests
- **Claude code review** integration
- **Security headers** and caching optimization
- **Form handling** for contact/appointment forms

## Troubleshooting

- Ensure all secrets are properly set in GitHub
- Verify Netlify site connection
- Check build logs in GitHub Actions
- Confirm Claude API key has sufficient credits