import java.util.ArrayList;

public class Database
{
    private ArrayList<Item> items;

    public Database()
    {
        items = new ArrayList<Item>();
    }

    public void addItem(Item theItem)
    {
        items.add(theItem);
    }

    public String list()
    {
        String theList = "";
        for (Item item : items )
        {            
             theList = theList + item.getDetails() +"\n";
        }    
        return theList;
    }
}
