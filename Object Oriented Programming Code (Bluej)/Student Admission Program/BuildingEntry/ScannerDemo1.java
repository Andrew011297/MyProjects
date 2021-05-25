import java.util.Scanner;

/**
 * A class to demonstrate the use of the Scanner 
 * class for keyboard input
 * 
 * @author Ian Bradley
 * @version 01
 */

public class ScannerDemo1
{
    private Scanner myScanner ; 
    
    /**
     * Constructor - passes System.in to a Scanner object
     */
    public ScannerDemo1()
    {
        myScanner = new Scanner( System.in);       
    }
    
    /**
     * An example based upon nextInt()
     */
    public void demo1()
    {
       System.out.println ( "Enter number of students " + 
                     " followed by the number of assignments");
       int students = myScanner.nextInt();
       int assignments = myScanner.nextInt();
       
       int totalAssignments = students * assignments;
       System.out.println( "There are a total of " +
                                totalAssignments + " assignments");
    }
    
    /**
     * An example based upon nextLine()
     */
    public  void echoLine() 
    {
        System.out.print( "Enter a line ");
        String text = myScanner.nextLine();
        System.out.println( "you entered: " + text);   
    }
    
    /**
     * An example to show a problem with nextLine()
     */
    public void problem()
    {
        System.out.println("Enter an int followed by two strings");
        int i = myScanner.nextInt();
        String s1 = myScanner.nextLine();
        String s2 = myScanner.nextLine();
        System.out.println( "i = " + i);
        System.out.println( "s1 = " + s1);
        System.out.println( "s2 = " + s2);      
        
        System.out.println( "s1 length = " + s1.length());
        System.out.println( "s2 length = " + s2.length());   
    }
    
     /**
     * An example to show the use of next()
     */
    public void nextExample()
    {
        System.out.println("Enter a short sentence of 4 words");
        String s1 = myScanner.next();
        String s2 = myScanner.next();
        String s3 = myScanner.nextLine();
        String s4 = s3.substring(1);
        System.out.println( "s1 = " + s1);
        System.out.println( "s2 = " + s2);
        System.out.println( "s3 = " + s3);     
        
        System.out.println( "s1 length = " + s1.length());
        System.out.println( "s2 length = " + s2.length());
        System.out.println( "s3 length = " + s3.length());     
        
        System.out.println( "s3 = " + s4 + " // without the first space!");             
    }
    
     public void nextExample2()
    {
        System.out.println("Enter an int & a string");
        int i = myScanner.nextInt();
        String s1 = myScanner.nextLine();
        
        System.out.println( "i  = " + i);
        System.out.println( "s1 = " + s1);
               
        System.out.println( "s1 length = " + s1.length());
       
    }

} // end ScannerDemo1 class

