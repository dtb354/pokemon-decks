### **08 - 10 - 2025**

* Started the Pokémon Decks project
* Made an About Us page

---

### **14 - 10 - 2025**

* Built my first model & controller to experiment with my database

---

### **15 - 10 - 2025**

* Made create and edit functionality for posts

---

### **19 - 10 - 2025**

* Updated database schema to fit more use cases:

  * Post to Strategy tags relation
  * Post to Type tags relation
  * User and Post to like relation
  * User and Post to comment relation
  * User and Post to favorite relation
  * User to post relation

---

### **20 - 10 - 2025**

* Edit functionality bug fix: edit form would get an error on submission
* Login controller & model updated to fit the new database schema

---

### **21 - 10 - 2025**

* Made a layout for nav using the Laravel template method

---

### **22 - 10 - 2025**

* Profile display page made
* Made changes to the home page to show different content for a logged out user or logged in user
* Posts are now linked to logged in user_id rather than hardcoded value in controller
* Image upload functionality has been added

---

### **23 - 10 - 2025**

* Styling changes for my create form
* Styling added to posts index page
* Added delete functionality and delete button added
* Edit functionality changed to support image changes

---

### **25 - 10 - 2025**

* Filter function added for posts index page
* Create and Edit page UI changes
* Admin post management feature added: You can activate and deactivate posts
* Active and Inactive posts filter added for admin views

---

### **27 - 10 - 2025**

* PostController edited to show only active posts on index posts page

---

### **28 - 10 - 2025**

* Removed the edit button for admin views: admins are not allowed to edit posts of other users
* Changed redirect after login
* Changed migrations to fit hosting database:

  * create_likes
  * create_users
  * create_posts

---

### **29 - 10 - 2025**

* Nav layout is changed when user is logged out
* Changed the create posts page to only allow logged in users
* Updated the comments table to delete on cascade
* Added comments functionality on posts
* Gave styling to individual post view
* Create and edit form UI changes: tags now get a dropdown form
* Removed edit and delete code for admins: admins should not be allowed to edit and delete posts

---




