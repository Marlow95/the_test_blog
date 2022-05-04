# the_test_blog

This is a simple crud app I made with vanilla php to practice planning Entities, Attributes, and Normalization in Database Design. 
Then execute this plan by applying functional and object-oriented programming. The purpose of this project is to practice Database Design &
String Manipulation. Which is one of the most critical skills when programming the backend. Always improving your fundamentals and applying the new things you know in better ways is a core skill for building better programs.

For now the functionality I wanted to test is pretty much done with just a few more tasks to complate. Some things I might add in the future are
an Admin Dashboard, Dynamic Post Ratings, and pagination. After I finish the Dashboad for Basic Users I will do some UI updates, unit tests, and refactoring.

Database Design

Entities

--Users
Attributes
----id
----firstname
----lastname
----email--(unique)
----username
----password
----user_bio
----role
----created_at
----last_login

--Posts
Attributes
----post_id
----post_title
----post_bio
----post_rating
----post_body
----user_id
----category_id
----created_at

--Comments
Attributes
----comment_id
----comment_title
----comment_body
----created_at
----user_id
----post_id

--Categories
Attibutes
----category_id
----category_title

