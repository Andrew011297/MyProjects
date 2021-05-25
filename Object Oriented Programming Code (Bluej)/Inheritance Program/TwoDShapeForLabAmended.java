/**
 * Write a description of class TwoDShapeForLab here.
 * 
 * @author (your name) 
 * @version (a version number or a date)
 */
public class TwoDShapeForLabAmended
{
    private double width;
    private double length;
    private static int shapeCount;
    
    

    /**
     * Parameterized constructor for TwoDShapeForLab
     * 
     * @param width the shape's width
     * @param length the shape's length
     */
    public TwoDShapeForLabAmended(double width, double length)
    {
        this.width = width;
        this.length = length;
        System.out.println("TDS"); 
        shapeCount++;
    }
    
    public TwoDShapeForLabAmended()
    {
        this.width = 0.0;
        this.length = 0.0;
        shapeCount++;
        System.out.println("TDS"); 
    }
    
    public void printShapeCount()
    {
      System.out.println("Number of shapes created is " + shapeCount); 
    }
    
    public void setWidth( double width)
    {
        this.width = width; 
    }
    
    public void setLength( double length)
    {
        this.length = length;
    }
    
    /**
     * Get the shape's width
     * 
     * @return the width
     */
    public double getWidth()
    {
        return width;
    }
    
    /**
     * Get the shape's length
     * 
     * @return the length
     */
    public double getLength()
    {
        return length;
    }
    
    public String toString()
    {
        return "Width and length are " + width + " and " + length;
    }
}

