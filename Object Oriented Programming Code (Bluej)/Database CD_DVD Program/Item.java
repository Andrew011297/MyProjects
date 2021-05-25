
/**
 * Write a description of class Item here.
 * 
 * @author (your name) 
 * @version (a version number or a date)
 */
public class Item
{
    private String comment;
    private boolean gotIt;
    private int playingTime;
    private String title;
    
    public Item(String theTitle, int time)
    {
        title = theTitle;
        playingTime = time;
    }
    
    public String getComment()
    {
        return comment;
    }
    
    public String getDetails()
    {
        String details =  title + " (" + playingTime + " mins)";
        if(gotIt) 
        {
            details = details + "*" + "\n";
        } 
        else 
        {
            details = details + "\n";
        }
        details = details + "    " + comment + "\n";
        return details;
    }
    
    public boolean getOwn()
    {
        return gotIt;
    }
    
    public void setComment(String comment)
    {
        this.comment = comment;
    }
    
    public void setOwn(boolean ownIt)
    {
        gotIt = ownIt;
    }
}
