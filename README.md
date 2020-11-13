# Assignment - Excel import and Cached profile page

## Steps to Install
- Clone this repo to your local.
- Run `composer install` on the project base folder.
- Update the .env file with the database connect details.
- Run `php artisan migrate` to migrate the table migrations.
- Run `php artisan db:seed` to seed the sample data. It will create 10 users.

## Steps to validate - Excel Import
- Import the sample excel-file. You can find the link on the navigation bar.
- Update your own records on that excel-file.
- Go to User Import link from the navigation menu.
- Try uploading the excel-file. Then click the import button to import the excel-data. 
- It will update the user record if the email already exists. Otherwise, it will create a new user record.
- It will notify you if any errors is there. Also, you will get a message if the import is successfully done.

## Steps to validate - Caching User Profile
- Login with a user account.
- Go to My Profile link from the navigation menu.
- The data loaded on the page will be cached if it is not cached within last hour.
- Now you have to update the logged in user record on the Database.
- On reloading the profile page within 1 hour. It will still show the cached data instead of loading the updated details from the database.
- Here the cached data is mapped against the logged in user. On loading the profile page by logging in with a different user will create a new set of cache with this user profile data. 
- This is a sample for caching some data against the logged in user. In real time we will use the caching functionality for some different scenarios. 
