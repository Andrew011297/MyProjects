/**
 * The dvd class represents a DVD object. Information about the 
 * DVD is stored and can be retrieved.
 * 
 * @author Michael Kolling and David J. Barnes
 * @version 2002-05-04
 */
public class DVD extends Item 
{
    private String director;

    /**
     * Constructor for objects of class DVD
     */
    public DVD(String theTitle, String theDirector, int time)
    {
        super(theTitle, time);
        director = theDirector;
    }

    /**
     * Return the director for this DVD.
     */
    public String getDirector()
    {
        return director;
    }
    
    public String getDetails()
    {
        String details =  director + "\n ";
        details = details + getTitle() + " (" + getPlayingTime() + " mins)";
        if(getOwn()) 
        {
            details = details + "*" + "\n";
        }
        else 
        {
            details = details + "\n";    
            details = details + "    " + getComment() + "\n";
            return details;
        }
    } 

}
