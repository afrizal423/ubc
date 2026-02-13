# UBS Gold Badminton Community (UBC) - Project Documentation

## Project Overview
A production-ready badminton community management system built for UBS Gold Badminton Community. It features a modern, high-performance public website and a comprehensive administrative dashboard for managing members, events, finances, and rankings.

## Tech Stack
- **Backend:** CodeIgniter 3.x (PHP)
- **Database:** MySQL (InnoDB) with Query Builder
- **Frontend:** Tailwind CSS (via CDN with custom config), Material Symbols, Vanilla JS
- **Charts:** Chart.js (Optimized for dark mode)
- **Security:** CSRF Protection, Password Hashing (`password_hash`), XSS Cleaning
- **PWA:** Manifest.json & Service Worker for offline caching

## Main Features
### Public Website (Tailwind CSS)
- **Modern Hero Section:** High-impact visuals with dynamic call-to-actions.
- **Dynamic Schedules:** Horizontal scrolling cards showing weekly sessions.
- **Elite Leaderboard:** Real-time ranking of top community performers.
- **Events & Gallery:** Grid view of upcoming highlights and community moments.
- **Financial Transparency:** Real-time financial reports (Income, Expense, Balance).
- **Registration Form:** Integrated join form for new members.

### Admin Panel
- **Comprehensive Dashboard:** Visual statistics for members, finances (Chart.js), and active players.
- **Full CRUD Management:**
    - **Members:** Directory management with status tracking.
    - **Financial:** Transaction ledger (Income/Expense) with CSV export.
    - **Events:** Event planning with image upload support.
    - **Schedules:** Weekly session planning.
    - **Attendance:** Daily participation tracking.
    - **Leaderboard:** Points, wins, and losses management.
    - **Gallery:** Community photo management with simplified uploads.
- **Interactive Modals:** All create/update actions are handled via Tailwind-styled modals for a seamless UX.

## Credentials
- **Admin Login:** `http://localhost/ubc/auth/login`
- **Username:** `admin`
- **Password:** `admin123`

## Database Configuration
- **Database Name:** `ubc_db`
- **Username:** `root`
- **Password:** `(empty)`
- **Schema:** Managed via `database.sql` in the root directory.

## Core Structure
- `application/controllers/`: 
    - `Website.php`: Handles all public-facing pages.
    - `Admin.php`: Contains all CRUD and management logic.
    - `Auth.php`: Handles secure admin authentication.
- `application/models/`: 
    - `Admin_model.php`: Advanced queries with JOINs for reports and leaderboard.
    - `Community_model.php`: Data retrieval for the public site.
- `application/views/`: 
    - `templates/`: Modern Tailwind headers and footers (Admin & Public).
    - `admin/`: Modular views for each management section.
- `assets/`:
    - `uploads/`: Storage for event and gallery images.
    - `js/admin.js`: Chart.js configurations and UI interactions.

## Recent Updates (Feb 2026)
- **Frontend Overhaul:** Migrated from Bootstrap 5 to a custom Tailwind CSS implementation based on "Stitch" designs.
- **Full CRUD Implementation:** Completed transaction logic for all modules in the Admin panel.
- **Relational Integration:** Enhanced models to support member-linked data in Attendance and Leaderboard.
- **UI/UX Enhancement:** Implemented modal-based workflows and improved dark mode consistency.
