
/**
 * Write a description of class Counter here.
 * 
 * @author (Andrew Robson) 
 * @version (23/01/2017)
 */
public class Counter
{
    private int count;
    /**
     * Create a new counter
     * intitialised to 0
     */
    public Counter()
    {
        count = 0;
    }
    /**
     * Return value of counter
     * @return current value of count
     */
    public int getCount()
    {
        return count;
    }
    /**
     * Add one to count
     */
    public void incrementCount()
    {
        count = count + 1;
    }
    /**
     * Reset count
     */
    public void reset()
    {
        count = 0;
    }
        
}
