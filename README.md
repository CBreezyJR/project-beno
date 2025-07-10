# Project Beno

## 🚀 Overview

**Project Beno** is a full-stack web application built using PHP and MySQL, designed to allow users to post content (including text and images), comment on posts, and interact with a map-based interface. The platform features user authentication, real-time interactivity using AJAX, and a modular structure for easy scalability.

---

## 🛠 Features

- ✅ User registration and login system (session-based authentication)
- 📝 Post creation and display with support for image uploads
- 💬 Commenting functionality powered by AJAX for seamless interaction
- 📍 Map interface (`busmap.html`) — designed for possible transit or location data visualization
- 🗃 MySQL database integration for persistent storage of users, posts, and comments
- 🔄 Asynchronous updates for improved user experience
- 🧩 Modular PHP structure for back-end clarity and scalability

---

## 💡 Tech Stack

- **Frontend**: HTML, CSS, JavaScript, AJAX
- **Backend**: PHP
- **Database**: MySQL
- **Other Tools**: PHP Sessions, File Uploads

---

## 🗂 File Structure

```
project-beno/
│
├── busmap.html              # Map-based interface
├── index.php                # Homepage
├── login.php / logout.php   # Auth system
├── post.php                 # Create/display posts
├── post_img_ajax.php        # AJAX for image upload
├── fetch_comments_ajax.php  # AJAX to retrieve comments
├── db.php / database.php    # DB connection logic
├── project1.sql             # MySQL database schema
└── screenshots/             # UI previews and images
```

---

## 📸 Screenshots

Screenshots of the UI and map interface can be found in the `screenshots/` directory.

---

## 🔒 Security Notes

This project is for learning purposes. Before deploying:
- Sanitize and validate all inputs
- Use prepared statements for database queries
- Implement stricter file upload validation (type/size checks)

---

## 📈 Future Improvements

- Role-based access control (Admin/User)
- Pagination for posts/comments
- Improved file validation
- Responsive design for mobile
- Real-time post updates using WebSockets

---

## 👨‍💻 Author

**Castro Ibrahim Sapi Mkwawa**  
- GitHub: [CBreezyJR](https://github.com/CBreezyJR)

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).

