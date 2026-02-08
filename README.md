# Sri Lanka Tuition Management System

Production-ready foundation for multi-institute tuition management (Laravel 12 + Vue 3 + Tailwind).

## Setup

```bash
cp .env.example .env
composer install
npm install
php artisan key:generate
php artisan migrate --seed
npm run dev
```

## Roles & Permissions

- **Super Admin**: Platform owner, cross-institute access.
- **Institute Admin/Owner**: Manage institute configuration and staff.
- **Branch Manager**: Branch-only management.
- **Teacher**: Attendance, exams, class insights.
- **Cashier**: Invoice and payment processing.
- **Student/Parent**: Portal access (planned).

## Sample Credentials (Seed)

- Admin: `admin@demo.lk` / `password`
- Teacher: `teacher@demo.lk` / `password`

## Architecture

- Domain modules in `app/Domain/*` with Models, DTOs, Policies, Services, Repositories, Events/Listeners.
- Controllers are thin and return API responses.
- Institute scoping middleware (`EnsureInstituteScope`) enforces tenant data boundaries.

## Key Commands

```bash
php artisan migrate --seed
php artisan test
npm run dev
```

## API Endpoints (MVP)

- `GET /api/institutes` / `POST /api/institutes`
- `GET /api/branches` / `POST /api/branches`
- `GET /api/halls` / `POST /api/halls`
- `GET /api/grades` / `POST /api/grades`
- `GET /api/subjects` / `POST /api/subjects`
- `GET /api/courses` / `POST /api/courses`
- `GET /api/batches` / `POST /api/batches`
- `GET /api/schedules` / `POST /api/schedules`
- `GET /api/sessions` / `POST /api/sessions`
- `GET /api/students` / `POST /api/students`
- `GET /api/guardians` / `POST /api/guardians`
- `GET /api/enrollments` / `POST /api/enrollments`
- `GET /api/users` / `POST /api/users`
- `GET /api/attendance/sessions/{sessionId}` / `POST /api/attendance`
- `GET /api/fee-plans` / `POST /api/fee-plans`
- `GET /api/invoices` / `POST /api/invoices`
- `GET /api/invoices/{invoiceId}`
- `GET /api/payments` / `POST /api/payments`
- `GET /api/exams` / `POST /api/exams`
- `GET /api/exams/{examId}/marks` / `POST /api/exams/{examId}/marks`
- `GET /api/notifications` / `POST /api/notifications`
- `GET /api/audit-logs`
- `GET /api/reports/collections`
- `GET /api/reports/arrears`
- `GET /api/reports/class-performance`
- `POST /login` / `POST /logout`

## Notes

- Use `Asia/Colombo` timezone in `config/app.php`.
- Money fields use `decimal(10,2)` for LKR.
- External integrations (SMS/WhatsApp/Payments) are defined as interfaces for future gateways.
