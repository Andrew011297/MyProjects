/**
 * Write a description of class TwoDShapeForLab here.
 * 
 * @author (your name) 
 * @version (a version number or a date)
 */
public class TwoDShapeForLab
{
    private double width;
    private double length;
    private static int shapeCount  ; 	
        
    public TwoDShapeForLab()
    {
        this.width = 0.0;
        this.length = 0.0;
        shapeCount++; 
    }

    
    /**
     * Parameterized constructor for TwoDShapeForLab
     * 
     * @param width the shape's width
     * @param length the shape's length
     */
    public TwoDShapeForLab(double width, double length)
    {
        this.width = width;
        this.length = length;
        shapeCount++; 
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
    
    public void printShapeCount()
    {
        System.out.println("Number of shapes created is " + shapeCount); 
    }

}

