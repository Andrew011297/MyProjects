/**
 * Andrew Robson - W16011147
 * Assignment java investigation code
 * version 1.0
 */
import java.util.*; //import library
import java.io.*; //import library

/**
 * This class will be used to write to a new file all the data 
 * such as the strings and the timing it takes for the list to 
 * fetch, insert and delete.
 */
public class StringDrvr {
    /*
     * This method is used to create the array and to read 
     * data from the strings file
     * @return returns the list
     */
    private static List<String> loadData(char mode, String path) throws IOException {
        List<String> data = null; //create an empty string
        if (mode == 'a') { //if mode is 'a' then continue
            System.out.println("ArrayList<String>"); //prints string to console
            data = new ArrayList<String>(); //create a new array list
        } else if (mode == 'l') { //if the mode is '1' then continue
            System.out.println("LinkedList<String>"); //prints string to console
            data = new LinkedList<String>(); //creates a new linked list
        } else { //else continue
            System.out.println("List mode unrecognised"); //print string to console
            System.exit(0); //exit the program
        }
        Scanner input = new Scanner(new BufferedReader(new FileReader(path))); //declare a new scanner
        while (input.hasNextLine()) { //while there is data, continue
            data.add(input.nextLine()); //add the data to the list
        }
            System.out.printf("%d items\n", data.size()); //display the size of the list to console
            input.close(); //close the scanner
            return data; //return the list
    }

    /*
     * This method will be used to display the different processes;
     * fetch, insert and delete
     * It will also display the average time it takes for each process to complete
     */
    public static void main(String[] args) throws IOException {
        if (args.length < 3) { //if there are less than 3 arguments continue
            System.err.println("Usage: java StringDrvr mode, data file, output file"); 
            //display the error to console
            return;
        }
        TimedListOps<String> app = new TimedListOps<String>(loadData(args[0].charAt(0), args[1]));
        //declare the app variable
        int dataLength = app.dLen(); //declare the dataLength variable
        PrintWriter writer = new PrintWriter(args[2]); //declare a new print writer
        System.out.println("Fetch Process:"); //print string to the console
        writer.println("Fetch Process:"); //print string to the file
        for (int i = 0; i < 15; i++) { //repeat 15 times
            long average = 0; //declare the average
            int location = (dataLength/15) * i; //declare the location
            for (int repeat = 0; repeat < 5; repeat++) { //repeat 5 times
                average += app.fetch(location); //set the average 
            }
              average = average/5; //divide the average by 5 to get the average
              System.out.println(location + " - " + average); //print to console
              writer.println(location + " - " + average); //print to file
        }
        writer.println("Insert Process:"); //write the string to the file
        for (int i = 0; i < 15; i++) { //repeat 15 times
            long average = 0; //declare the average
            int location = (dataLength/15) * i; //declare the location
            for (int repeat = 0; repeat < 5; repeat++) { //repeat 5 times
                average += app.insert(100-5*i, "******* insert *******"); //set the average
            }
            average = average/5; //divide the average by 5 to get the new average
            System.out.println(location + " - " + average); //print to system
            writer.println(location + " - " + average); //print to file
        }
        writer.println("Delete Process:"); //print the string to the file
        for (int i = 0; i < 15; i++) { //repeat 15 times
            long average = 0; //declare the average
            int location = (dataLength/15) * i; //declare the location
            for (int repeat = 0; repeat < 5; repeat++) { //reeat 5 times
                average += app.delete(location); //set the average
            }
            average = average/5; //divide the average by 5 to get the new average
            System.out.println(location + " - " + average); //print to console
            writer.println(location + " - " + average); //print to file
        }
        writer.close(); //close the file
    } 
}
