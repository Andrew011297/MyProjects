public class Item
{
    private String title;
    private int playingTime;
    private boolean gotIt;
    private String comment;

    public Item(String theTitle, int time)
    {
        title = theTitle;
        playingTime = time;
        gotIt = false;
        comment = "";
    }
    
    public void setComment(String comment)
    {
        this.comment = comment;
    }

    public String getComment()
    {
        return comment;
    }

    public void setOwn(boolean ownIt)
    {
        gotIt = ownIt;
    }

    public boolean getOwn()
    {
        return gotIt;
    }
    
    public String getDetails()
    {
        String details =  title + " (" + playingTime + " mins)";
        if(gotIt) {
            details = details + "*" + "\n";
        } else {
            details = details + "\n";
        }
        details = details + "    " + comment + "\n";
        return details;
    }
    
    public String getTitle()
    {
        return title;
    }
    
    public int getPlayingTime()
    {
        return playingTime;
    }
}
