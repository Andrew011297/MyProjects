import java.util.ArrayList;

/**
 * The database class provides a facility to store CD and DVD 
 * objects. A list of all CDs and dvds can be printed to the
 * terminal.
 * 
 * This version does not save the data to disk, and it does not
 * provide any search functions.
 * 
 * @author Michael Kolling and David J. Barnes
 * @version 1.0
 */
public class Database
{
    private ArrayList<CD> cds;
    private ArrayList<DVD> dvds;

    /**
     * Construct an empty Database.
     */
    public Database()
    {
        cds = new ArrayList<CD>();
        dvds = new ArrayList<DVD>();
    }

    /**
     * Add a CD to the database.
     */
    public void addCD(CD theCD)
    {
        cds.add(theCD);
    }

    /**
     * Add a DVD to the database.
     */
    public void addDVD(DVD theDVD)
    {
        dvds.add(theDVD);
    }

    /**
     * Print a list of all currently stored CDs and dvds to the
     * text terminal.
     */
    public String list()
    {
       
        String cdList = "";
        for ( CD cd : cds )
        {            
             cdList = cdList + cd.getDetails() +"\n";
        }

        
        String dvdList = "";
        for ( DVD dvd : dvds )
        {            
             dvdList = dvdList + dvd.getDetails() +"\n";
        }
        
        return cdList + dvdList;
    }
}
