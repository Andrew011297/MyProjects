
/**
 * Exercise 2
 * 
 * @author Andrew Robson 
 * @version 30/01/2017
 */
public class AdmissionControl
{
    private BoundedCounter noInBuilding;
    private int max;
    
    /**
     * 
     */
    public AdmissionControl(int maxOccupancy)
    {
        noInBuilding = new BoundedCounter (maxOccupancy);
        max = maxOccupancy;
    }
    
    /**
     * 
     */
    public int getNumberInBuilding()
    {
        return noInBuilding.getCount();
    }
    
    /**
     * 
     */
    public int getMaxOccupancy()
    {
        return max;
    }
    
    public void enterBuilding()
    {
        boolean success = noInBuilding.incrementCount();
        if (success )
        {
            System.out.println("number in building is " + noInBuilding.getCount() );
        }
        else
        {
            System.out.println("no entry building full");
        }
    }
    
    public void leaveBuilding()
    {   
        if (noInBuilding() > 0)
        {
             System.out.println("thank you for coming " + noInBuilding.decrementCount() );
        }
        else
        {
            System.out.println("The building was empty?");
        }
    }

        
}
