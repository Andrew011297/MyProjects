/**
 * A more advanced version of the counter
 * 
 * @author Andrew Robson 
 * 30/01/2017
 */
public class BoundedCounter
{
    private int count ;
    private int maxAllowed;
    
    /**
     * Create an new Counter
     * with count initialised to 0
     * @param maxCount the maximum value allowed
     */
    public BoundedCounter(int maxCount)
    {
        count = 0;
        maxAllowed = maxCount;
    }
    
    /**
     * Return  value of counter.
     * @return current value of count
     */
    public int getCount()
    {
        return count ;
    }
    
    /**
     * Add 1 to count
     */
    public boolean incrementCount()
    {
        if (count < maxAllowed)
        {
            count = count + 1;
            return true;
        }
        else
        {
            return false;
        }
    }
    
    /**
     * reset count to 0
     */
    public void reset()
    {
        count = 0;
    }
    
    /**
     * Decrement count by 1 as long as count >=1, 
     * otherwise print a message to the console window.
     */
    public void decrementCount()
    {
        if (count > 0 )
        {   
            count = count - 1;
        }
        else
        {
            System.out.println("error count is already 0");
        }   
    }
    
    /**
     * Get the max value allowed
     * @return the max value
     */
    public int getMaxAllowed()
    {
        return maxAllowed;
    }

} // end class