# Wasfati
# Get Started
## How to run the code
1. Host the db in PHPMyAdmin using the TDW.sql
2. Host the files in the server with the same structure. You can use 
```
PHP -S localhost:8000
```
or use WAMP/XAMP...
3. Route the the main page. in our example:
```
  localhost:8000/index.php
```
## How to use the Project
1. you can access every page without any need to login except Profile and rating features.
2. to login , click on `S'identifier`, si vous n'avez pas un compte vous pouvez creer votre propre compte (On ignore la validation de compte jusqu'a la creation de coté admin)
# Features implemented
* Home page
* News page
* Detail page
* Recipe page ( list of recipes in category or Healthy...) with filter (search feature is not ready)
* Contact page
* nurition page 
* auth (upload images not ready yet)
* admin backend (almost ready)

# features left

* admin UI (almost ready -> Copy paste from TP with few modification)
* Idée de recette (recherche des ingredient)
* add recipe for user
* update the structure (split the controllers and the update the routing system)
