package com.company;

import java.io.File;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.List;
import java.util.Random;
import java.util.Scanner;

// This is a quick hangman to practice JAVA

public class Main {

    public static void main(String[] args) throws FileNotFoundException {
        // this allows access to the list of word text file
        Scanner scanner = new Scanner(new File("C:/Users/david/Documents/work/Word/listofcountries.txt"));
        Scanner in = new Scanner(System.in);
        // To check if the list actually prints I use this essential it will see what is next and the print the next line

        //This will loop through the file and add every word to the list

        List<String> words = new ArrayList<>();
        while (scanner.hasNext()) {
            //adding words to the list
            words.add(scanner.nextLine());
        }
        //This the randomizer object
        Random rand = new Random();
        //The string will select a word from the list usually you would input a number however I used the size of the list
        String word = words.get(rand.nextInt(words.size()));

        //Here we just add the guesses to a list
        List<Character> playerGuesses = new ArrayList<>();


        //looping through so it can keep asking the user a character
        int wrongCount = 0;
        while(true) {

            printHangedMan(wrongCount);
            // Here I used a number of if statemenets so that the hangmans body parts could be added
            if (wrongCount >=6) {
                System.out.println("You Lose!");
                break;
            }


            printWordState(word, playerGuesses);
            //This essentially says if the players guess is incorrect the wrong count should increase which will trigger the if statements
            if (!getPlayerGuess(in, word, playerGuesses)) {
                wrongCount++;
            }

            //if the user enters the correct characters it will stop the program
            if(printWordState(word, playerGuesses)){
                System.out.println("You win!");
                break;
            }
            // Asks the user for a final guess then compares it to the word displayed
            System.out.println("Please enter your final guess for the word: ");
            if (in.nextLine().equals(word)){
                System.out.println("You win!");
                break;
            }
            else {
                System.out.println("Nope try again!");
            }
        }

    }

    private static void printHangedMan(int wrongCount) {
        System.out.println(" _ _ _ _ _ _ _");
        System.out.println(" |            |");

        if (wrongCount >= 1) {
            System.out.println(" O");
        }
        if (wrongCount >= 2) {
            System.out.print("\\ ");
            if (wrongCount >= 3) {
                System.out.println("/");
            } else {
                System.out.println();
            }
        }
        if (wrongCount >= 4) {
            System.out.println(" |");
        }
        if (wrongCount >= 5) {
            System.out.print("/ ");
            if (wrongCount >= 6) {
                System.out.println("\\");
            } else {
                System.out.println("");
            }
        }
        System.out.println("");
        System.out.println("");
    }


    private static boolean getPlayerGuess(Scanner in, String word, List<Character> playerGuesses) {
        //Prompting the user to input a letter
        System.out.println("Please enter a letter: ");
        String letterGuess = in.nextLine();
        //Limits users input to the first character of the word
        playerGuesses.add(letterGuess.charAt(0));

        return word.contains(letterGuess);
    }

    private static boolean printWordState(String word, List<Character> playerGuesses) {
        int correctCount = 0;
        //Here I created a loop to loop through the word
        for (int i = 0; i < word.length(); i++) {
            //this essentially states if the guess contains a charracter(letter) at the inputted do...
            if (playerGuesses.contains(word.charAt(i))) {
                correctCount++;
                //Used print instead of println so its one after the other
                System.out.print(word.charAt(i));
            } else {
                System.out.print("-");
            }
        }
        System.out.println();
        //The method is boolean so if word.length() == correctCount it will essentially return true
        return (word.length() == correctCount);
    }
}
