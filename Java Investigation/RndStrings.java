/**
 * Andrew Robson - w16011147
 * Utilises code created by Michael Brockway 
 * Code has been adapted to fulfill my own purposes
 * version 1.0
 */
import java.util.Random; //import library
import java.util.*; //import library
import java.io.*; //import library

/*
 * Class creates a random string of a length that is specified by the user
 * Then prints the string to a text file
 */
public class RndStrings {
    private static char[] alphabet = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM".toCharArray();
    //declares the character array; alphabet
    private static int ctr = 0; //declares the int; ctr
    private static Random rnd = new Random(); //declares the variable rnd
    public PrintWriter writer; //declares the print writer

    /*
     * Method creates the random string, takes the character array and creates a random assortment of the 
     * characters within the array
     * @return returns the string
     */
    private static String rndStg(int ln) {
        char[] chars = new char[ln]; 
        for (int i=0; i<ln; i++) { 
            chars[i] = alphabet[rnd.nextInt(alphabet.length)];
        }
        return new String(chars);  
    }

    /*
     * Method takes the strings created and writes them to a file
     * the minimum and maximum of characters per string is declared 
     * as well as the number of strings to be created
     */
    public static void main(String[] args) {
        if (args.length < 3) { 
            System.out.println("Usage: java RndStrings n m p");
            System.out.println(" to make n random strings, m <= length < m+p");
            return;
        }
        int num = Integer.parseInt(args[0]), //declares the number variable
        min = Integer.parseInt(args[1]), //declares the min variable
        max = Integer.parseInt(args[2]); //declares the max variable
        try
        {
            PrintWriter writer = new PrintWriter("testData.txt"); //create a print writer and assign it a file to write to
            for (int k = 0; k < num; k++){
                String strings = rndStg(min+rnd.nextInt(max)); //creates the string
                System.out.println(k + " - " + strings); //prints the string to the console
                writer.println(strings); //writes the string to the writer
            }
            writer.close(); //closes the file
        }
        catch(FileNotFoundException e)
        {
            System.out.println("File could not be found"); //prints message to the file
        }
        
    }
}
