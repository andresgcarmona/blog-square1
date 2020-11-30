# Square1 Blog platform.

In order to run the application, you need **Docker** and **Docker compose** installed in your system. Once you have installed both, you can use the next commands to clone and build the application.

 1. Clone the repository: git clone **https://github.com/andresgcarmona/blog-square1.git**
 2. Change to the newly created directory: **cd blog-square1**
 3. Run **docker-compose up --build -d**
 4. Run **docker-compose run --rm composer install**
 5. Run **docker-compose run --rm npm install**
 6. Run **docker-compose run --rm npm dev**
 7. Run **cd src && cp .env.example .env && cd ..**
 8. Run **docker-compose run --rm artisan key:generate**
 9. Run **docker-compose run --rm artisan migrate --seed**

Once all the previous commands are run, you can open the application at http://localhost:8080 in your browser.
 
Run **docker-compose run --rm artisan schedule:run** to activate the laravel scheduler and start fetching post from the API. The scheduler was set to run every hour, but in order to test it I have reduced the interval to everyminute.
