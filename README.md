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
- Try uploading the excel-file. Then click import to import. 
- It will update the user record if the email already exists. Otherwise, it will create a new user record.
- It will notify you if any errors is there. Also, you will get a message if the import is successfully done.

## Steps to validate - Caching User Profile
- Login with a user account.
- Go to My Profile link from the navigation menu.
- The page loaded will be cached if it is not cached within last hour.
- Now you have to update the logged in user record on the Database.
- On reloading the m-profile page within 1 hour. It will still show the cached data instead of loading the updated details from the database.
- This is a sample for caching the data. In real time we will use the caching for some other scenario. 
