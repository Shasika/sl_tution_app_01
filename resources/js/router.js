import { createRouter, createWebHistory } from 'vue-router';
import LoginPage from './pages/LoginPage.vue';
import DashboardPage from './pages/DashboardPage.vue';
import InstitutePage from './pages/InstitutePage.vue';
import BranchesPage from './pages/BranchesPage.vue';
import HallsPage from './pages/HallsPage.vue';
import UsersPage from './pages/UsersPage.vue';
import GradesPage from './pages/GradesPage.vue';
import SubjectsPage from './pages/SubjectsPage.vue';
import CoursesPage from './pages/CoursesPage.vue';
import BatchesPage from './pages/BatchesPage.vue';
import SessionsPage from './pages/SessionsPage.vue';
import StudentsPage from './pages/StudentsPage.vue';
import StudentProfilePage from './pages/StudentProfilePage.vue';
import AttendanceSessionPage from './pages/AttendanceSessionPage.vue';
import InvoicesPage from './pages/InvoicesPage.vue';
import InvoiceDetailPage from './pages/InvoiceDetailPage.vue';
import PaymentsPage from './pages/PaymentsPage.vue';
import ExamsPage from './pages/ExamsPage.vue';
import ExamMarksPage from './pages/ExamMarksPage.vue';
import CollectionsReportPage from './pages/CollectionsReportPage.vue';
import ArrearsReportPage from './pages/ArrearsReportPage.vue';
import ClassPerformanceReportPage from './pages/ClassPerformanceReportPage.vue';

const routes = [
  { path: '/login', component: LoginPage },
  {
    path: '/app',
    component: () => import('./layouts/AppLayout.vue'),
    children: [
      { path: 'dashboard', component: DashboardPage },
      { path: 'institute', component: InstitutePage },
      { path: 'branches', component: BranchesPage },
      { path: 'halls', component: HallsPage },
      { path: 'users', component: UsersPage },
      { path: 'grades', component: GradesPage },
      { path: 'subjects', component: SubjectsPage },
      { path: 'courses', component: CoursesPage },
      { path: 'batches', component: BatchesPage },
      { path: 'sessions', component: SessionsPage },
      { path: 'students', component: StudentsPage },
      { path: 'students/:id', component: StudentProfilePage },
      { path: 'attendance/sessions/:id', component: AttendanceSessionPage },
      { path: 'invoices', component: InvoicesPage },
      { path: 'invoices/:id', component: InvoiceDetailPage },
      { path: 'payments', component: PaymentsPage },
      { path: 'exams', component: ExamsPage },
      { path: 'exams/:id/marks', component: ExamMarksPage },
      { path: 'reports/collections', component: CollectionsReportPage },
      { path: 'reports/arrears', component: ArrearsReportPage },
      { path: 'reports/class-performance', component: ClassPerformanceReportPage }
    ]
  },
  { path: '/', redirect: '/login' }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
