import java.util.*; 
/**
 * User Interface for Lab Class.
 * To support ArrayList example
 * 
 * @author Ian Bradley 
 * @version October 2010
 */
public class DatabaseUI
{
    private Scanner keyboard;
    private Database database;

    /**
     * Constructor 
     */
    public DatabaseUI()
    {
        keyboard = new Scanner(System.in);
        database = new Database();
    }

    /**
     * The main menu for the user interface.
     */
    public void menu()
    {
        int command = -1;
        while ( command != 0 )
        { 
            displayMenu();
            command = getCommand();
            execute( command );
        }
    }

    private void displayMenu()
    {
        System.out.println( "Item Database" );
        System.out.println("   Add an item        1");
        System.out.println("   List all entries   2");
        System.out.println("   Quit               0");
    }

    private int getCommand()
    {
        System.out.print ("Enter command: ");
        int command = keyboard.nextInt();
        keyboard.nextLine();
        return command;        
    }

    private void execute( int command)
    {
        if ( command == 1)
            addItem();
        else
        if ( command == 2 )
            listAll();
        else
        if ( command == 0)
            System.out.println( " Program closing down");
        else
            System.out.println("Unknown command"); 
    }

    private void addItem()
    {
        System.out.print("Enter type, CD or DVD : ");
        String type = keyboard.next();
        keyboard.nextLine();
        if ( type.equals("CD") )
        {
            CD cd = createCD();
            database.addItem(cd);
        }
        else
        {
            DVD dvd = createDVD();
            database.addItem(dvd);
        }
    }

    private CD createCD()
    {
        System.out.print( "Enter title of CD: ");
        String title = keyboard.nextLine();
        System.out.print( "Enter name of artist: ");
        String artist = keyboard.nextLine();
        System.out.print( "Enter number of tracks: ");
        int tracks = keyboard.nextInt();
        keyboard.nextLine();
        System.out.print( "Enter playing time: ");
        int time = keyboard.nextInt();
        keyboard.nextLine();
        return new CD(title, artist, tracks, time);
    }


    private DVD createDVD()
    {
        System.out.print( "Enter title of DVD: ");
        String title = keyboard.nextLine();
        System.out.print( "Enter name of the director: ");
        String director = keyboard.nextLine();
        System.out.print( "Enter playing time: ");
        int time = keyboard.nextInt();
        keyboard.nextLine();
        return new DVD(title, director, time);
    }

    private void listAll()
    {
        System.out.println( database.list() ); 
    }
}

