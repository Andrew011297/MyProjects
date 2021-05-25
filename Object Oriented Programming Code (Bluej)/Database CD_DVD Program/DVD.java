/**
 * The DVD class represents a DVD object. Information about the 
 * DVD is stored and can be retrieved.
 * 
 * @author Michael Kolling and David J. Barnes
 * @version 1.0
 */
public class DVD extends Item 
{
    private String director;
    private boolean gotIt;
    private String comment;

    /**
     * Constructor for objects of class DVD
     */
    public DVD(String theTitle, String theDirector, int time)
    {
        super(theTitle, time);
        director = theDirector;
        gotIt = false;
        comment = "<no comment>";
    }

    /**
     * Enter a comment for this DVD.
     */
    public void setComment(String comment)
    {
        this.comment = comment;
    }

    /**
     * Return the comment for this DVD.
     */
    public String getComment()
    {
        return comment;
    }

    /**
     * Set the flag indicating whether we own this DVD.
     */
    public void setOwn(boolean ownIt)
    {
        gotIt = ownIt;
    }

    /**
     * Return information whether we own a copy of this DVD.
     */
    public boolean getOwn()
    {
        return gotIt;
    }

    /**
     * Print details about this DVD to the text terminal.
     */
    public String getDetails()
    {
        String details = "DVD: " + title + " (" + playingTime + " mins)";
        if(gotIt) 
        {
            details = details +"*"+ "\n";
        } 
        else 
        {
            details = details +"\n";
        }
        details = details + "    " + director +"\n";
        details = details + "    " + comment + "\n";
        return details;
    }
}
