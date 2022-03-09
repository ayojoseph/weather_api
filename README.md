Weather_api Task

This app was crete using the Laravel framework.
To use this app, clone the repo and run the command docker-compose up --build
If you have another mysql db using port 3306 you may run into issues. It is best to delete that instance or use a completely different machine.

App can be accessed through: http://localhost:8000/

No users are in the app initially so you will have to sign-up. 
Once signed-up you will be logged-in and prompted to share your location shortly after.
The weather api might take a minute to fetch the weather so please be patient. 
After this you can make your user an admin by changing the route from "weather" to "makeadmin" (you have to be logged in for this of course)
Admin link will appear at the top and now you can navigate over to the admin page to see logs of users and their locations.

Clicking "logout" will logout of the app and clicking your name will return to the weather page. 


***Tested on MacOS only...

Known Issues:

- Everytime /weather page is hit, it fetches for weather again which creates another user log ( would add some caching feature to the api to prevent this)
- composer install had to be added again into migrate_and_serve script. For some reason, the initial one in dockerfile doesn't create vendor folder with packages.