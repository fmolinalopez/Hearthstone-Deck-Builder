# HEARTHSTONE DECK BUILDER #
## Database Creation ##
Create a new dababase in mysql and import **_createdb.sql_** script.

## Database access ##
Create a **_.env_** file in the project and configure it with your database.
You have **_.env-example_** as an example of how to configure it.

## Composer ##
You need composer installed to run this app.
Once you have composer installed run **_composer install_** command to install all dependencies required for the app.

## Autoload ##
You have to add 
```
"autoload": {
           "psr-4":{
               "App\\": "app/"
           }
       }
```
to the composer.json file that generates when you install project dependencies.
Once you've added it run **_composer install_** command again.

## Using the app ##
You'll need to **create** an account to use the app, go to Access menu on top right and click Registro and proceed to register.
Once you're registered go to the Access menu and log in.
Now that you're logged in you can use the app.

### Create New Deck ###
You can create a new deck clicking on Create new Deck option.
Once you are in the Create New Deck form type your deck name and proceed to adding cards to it.

    Adding cards to a deck:
    First select the card you want to add from the list of cards.
    Then click Add Card to Deck to add that card.
    You can't add a card twice and Decks must contain 15 cards.
    Deleting cards form a deck:
    First select the card you want to delete from the list of cards.
    Then click Delete Card From Deck to delete that card.
    Clearing current cards:
    If you click the Clear Card list button all cards from Current Cards
    field will be deleted.
When you've added a deck name and 15 cards to the deck click Create Deck button to create it.

### Edit an existing deck ###        
Click the Edit button next to the list of cards in the deck to edit it.
Once you're in the Edit Deck form you can edit its name, the current card list or both.
Buttons Add Card to Deck, Delete Card From List and Clear Card List works the same way 
as creating a new deck, click Edit deck once you've finished editing it to apply changes.

### Deleting an existing deck ###
Click the Delete button next to the Edit button of a deck to delete that deck.

### Card List ###
Click on Card List to access the Card List page wich displays a list with the image of every card.
If you click a card you'll go to that card info page.

### Card info ###
Displays all values for the selected card and let you edit them.

### Edit Card Info ###
Click on the Edit button in the Card Info page to edit that card.
Once you are in the Edit Hearthstone Card form you can change any value of a card.

    Be careful when editing a card.
    Spell cards can't have an attack nor health value.
    Spell cards always have an effect.
    Minion and Weapon cards always have an attack of 0 or higher.
    Minion and Weapon cards alwais have a health of 1 or higher.
    Minion and Weapon cards can have no effect.
    
Once you've finished editing a card click Edit Card to aplly changes.
