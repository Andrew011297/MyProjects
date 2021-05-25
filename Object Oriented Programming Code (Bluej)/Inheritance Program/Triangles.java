
/**
 * This extends the base class to be used in the 
 * first part of the inheritance 
 * lab.
 * 
 * @author Ian Bradley 
 * @version 1.0
 */
public class Triangle extends TwoDShapeForLab
{
    private String style;

    /**
     * Constructor for objects of class Triangle
     */
    public Triangle(String style, double width, double length)
    {
        super(width, length);
        this.style = style;      
    }

    /**
     * Calculates the area of the triangle as 
     * width * length / 2.0.
     * 
     * @return     the area of the triangle 
     */
    public double area()
    {
        return getWidth() * getLength() / 2.0 ;
    }    
    
    /**
     * gets the triangle style
     * 
     * @return the styel of the triangle
     */
    public String getStyle()
    {
        return style;
    }
    
    public void printStyle()
    {
        System.out.println("Triangle is " + style);
    }
}
