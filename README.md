# iterated_basic
Files for setting up a basic text based iterated learning experiment

This code will help you set up the stimuli, SQL database and experiment neccessary for running a very basic iterated learning experiment. The experiment itself will present people with a sentence and then ask them to answer a few questions. One of their answers to the question will be used to generate a new iteration. Each subject performs one trial.

## Setup

These are the files you'll have to modify:

1. config.php-Add database settings, experiment name, timing
2. stimuli_text.csv-The actual text people will remember. This is a formatted stringNote, currently hardcoded to allow three words to change. pass_along specificies which of the %s will be used for the next iteration. Note, the ID must map onto questions.csv. 
3. questions.csv-The questions people will be asked after the text is presented. Once again, ID must match stimuli_text.csv

You'll probably also want to change

4. instructions.php-To make this experiment relevant
5. trial.php-You may want to add images, change what text is presented or passed on, etc. Theoretically, if you have only %s passed between iterations, people will just iterate bodies of text.

## Database

Iterated learning experiments require some complicated database structures. I've set it up so:

* Each database entry has a status
  1. wait-An entry is waiting to be claimed by a participant
  2. init-A participant has logged in and claimed an entry
  3. claimed-An entry has been claimed
  4. completed-Entry N has been completed and a new entry N+1 with the iterated information has been added.

So each entry goes from wait->claimed->completed. init exists solely as a record that the participant logged in (in case you want to exclude previous participants who did not complete the study).

## Running the experiment

Once you have that set up, you should be able to manage the experiment from index.php. The database requires some management--If a participant claims a chain, we want to make sure other participants don't claim the chain until they're done. 

But when participants don't complete the task, you will have to manually unclaim their chain. You can use the "Check Subject Status" button on the index page to see what subjects have not completed the task. If you want to remove a specific subject, click "Remove Subject". If you want to remove all subject who have taken more than a certain amount of time, click "Clear Subjects Past Time Limit". Depending on your needs, you may want to create a cronjob that automatically runs the time limit script.



