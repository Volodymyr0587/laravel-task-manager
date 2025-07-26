# Tasks Manager App

A modern, responsive task management application built with Laravel and Tailwind CSS. This application provides a clean and intuitive interface for managing your daily tasks with user authentication and profile management.

## Features

- **User Authentication**: Secure login and registration system
- **Task Management**: Create, read, update, and delete tasks
- **Task Status Tracking**: Organize tasks by status (pending, in progress, completed)
- **User Profile Management**: Update profile information, change passwords, and delete accounts
- **Responsive Design**: Optimized for desktop and mobile devices
- **Modern UI**: Clean interface built with Tailwind CSS

## Tech Stack

- **Backend**: Laravel 10.x
- **Frontend**: Blade Templates + Tailwind CSS
- **Database**: MySQL/PostgreSQL/SQLite
- **Authentication**: Laravel Breeze
- **Icons**: Heroicons (via SVG)

## Installation

### Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js & NPM
- MySQL/PostgreSQL/SQLite database

### Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/tasks-manager.git
   cd tasks-manager
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   
   Edit your `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tasks_manager
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run database migrations**
   ```bash
   php artisan migrate
   ```

7. **Build assets**
   ```bash
   npm run build
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` to access the application.

## Usage

### Getting Started

1. **Register an account** or login if you already have one
2. **Access the dashboard** to see your tasks overview
3. **Create a new task** by clicking the "Create Task" button
4. **Manage tasks** by viewing, editing, or deleting them
5. **Update your profile** in the profile settings

### Task Management

- **Create Task**: Add title, description, and set initial status
- **Update Task**: Modify task details and change status
- **Delete Task**: Remove tasks you no longer need
- **Status Options**: 
  - Pending
  - In Progress
  - Completed

### Profile Management

- **Update Profile Information**: Change name and email
- **Change Password**: Update your account password
- **Delete Account**: Permanently remove your account and all data

## Project Structure

```
├── app/
│   ├── Enums/
│   │   └── TaskStatus.php          # Task status enumeration
│   ├── Http/
│   │   └── Controllers/
│   │       └── TaskController.php   # Task CRUD operations
│   └── Models/
│       └── Task.php                # Task model
├── database/
│   └── migrations/
│       └── create_tasks_table.php   # Task table migration
├── resources/
│   ├── views/
│   │   ├── tasks/                  # Task-related views
│   │   ├── profile/                # Profile management views
│   │   └── layouts/                # Layout templates
│   └── css/
│       └── app.css                 # Tailwind CSS
├── routes/
│   └── web.php                     # Application routes
└── README.md
```

## Database Schema

### Tasks Table

| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| user_id | bigint | Foreign key to users table |
| title | varchar(255) | Task title |
| description | text | Task description |
| status | enum | Task status (pending, in_progress, completed) |
| created_at | timestamp | Creation timestamp |
| updated_at | timestamp | Last update timestamp |

## API Routes

| Method | URI | Action | Description |
|--------|-----|--------|-------------|
| GET | `/tasks` | index | List all tasks |
| GET | `/tasks/create` | create | Show create form |
| POST | `/tasks` | store | Create new task |
| GET | `/tasks/{task}` | show | Show specific task |
| GET | `/tasks/{task}/edit` | edit | Show edit form |
| PUT/PATCH | `/tasks/{task}` | update | Update task |
| DELETE | `/tasks/{task}` | destroy | Delete task |

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## Development

### Running in Development

```bash
# Start the Laravel development server
php artisan serve

# Watch for asset changes (in another terminal)
npm run dev
```

### Code Style

This project follows Laravel coding standards. Please ensure your code is properly formatted before submitting.

### Testing

```bash
# Run PHP tests
php artisan test

# Run with coverage
php artisan test --coverage
```

## Deployment

### Production Build

```bash
# Install dependencies
composer install --optimize-autoloader --no-dev

# Build assets for production
npm run build

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Environment Variables

Ensure these environment variables are set in production:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=your_db_host
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_secure_password
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

If you encounter any issues or have questions, please:

1. Check the [Laravel documentation](https://laravel.com/docs)
2. Review existing [GitHub issues](https://github.com/yourusername/tasks-manager/issues)
3. Create a new issue if needed

## Acknowledgments

- [Laravel](https://laravel.com) - The PHP framework
- [Tailwind CSS](https://tailwindcss.com) - The utility-first CSS framework
- [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze) - Authentication scaffolding
- [Heroicons](https://heroicons.com) - Beautiful hand-crafted SVG icons

---

**Built with ❤️ using Laravel & Tailwind CSS**
