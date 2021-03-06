# simple-QA-blog-with-laravel

documentation
-------------
  this is a simple QA blog tested with fake data using factory and seeds and also tested with real data by entering it through the demo

Setup
-------
- Create a database named questions in MySQL database server
- Setup your LAMP environment and copy the project folders and files into your public_html folder
- Configure your hostname and database credential in the .env file
- Run php artisan migrate to setup the database
- Run php artisan db:seed to seed the database

QA blog Requirements
--------------------



  Functional requirements
  -----------------------
      - The added question should appear immediately in the UI
      - The added answer should appear immediately in the UI
      - The user can like or dislike a question
      - The user can like or dislike an answer
      - The user can delete a question
      - The user can delete an answer
      - The main page should show the top liked questions first
      - The answers of each question are sorted based on the likes
      - The guest user can answer one question at a time
      - The guest user can read all answers of the same question in the same page
      
  Non-Functional requirements
  ---------------------------
      - The pages must be responsive
      - Transitioning between pages takes maximum 1 sec
      - The website should be compatible with all browsers
      - The website should be easy to use
  
  PDFs
  --------
  - [QA blog Requirements.pdf](https://github.com/haniaraslan/simple-QA-blog-with-laravel/files/7110492/QA.blog.Requirements.pdf)
  - [QA-useCase.pdf](https://github.com/haniaraslan/simple-QA-blog-with-laravel/files/7110493/QA-useCase.pdf)


