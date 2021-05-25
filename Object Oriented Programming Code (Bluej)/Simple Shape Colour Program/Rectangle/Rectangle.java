
/**
 * A simple class representing a rectangle.
 * Intended to be used in lecture 1 of Programming 1.
 * 
 * @author Ian Bradley 
 * @version July 2010
 */
public class Rectangle
{
    // instance variables 
    private int length;
    private int breadth;

    /**
     * Constructor for objects of class Rectangle.
     */
    public Rectangle()
    {
        length = 0;
        breadth = 0;
    }

    /**
     * Asigns a value to length.
     * 
     * @param  length  the length of the rectangle 
     */
    public void setLength(int length)
    {
        this.length = length;
    }
    
    /**
     * Asigns a value to breadth.
     * 
     * @param  breadth  the breadth of the rectangle 
     */
    public void setBreadth(int breadth)
    {
        this.breadth = breadth;
    }
    
    /**
     * obtains the current value of length.
     *
     * @return     the length
     */
    public int getLength( )
    {
        return length;
    }
    
     /**
     * obtains the current value of breadth.
     *
     * @return     the breadth
     */
    public int getBreadth( )
    {
        return breadth;
    }
    
    /**
     * Calculates the area of the rectangle.
     *
     * @return     the area of the rectangle
     */
    public int calculateArea()
    {
        return length * breadth;
    }

}
