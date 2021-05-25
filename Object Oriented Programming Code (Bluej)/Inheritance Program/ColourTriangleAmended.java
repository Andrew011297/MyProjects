
/**
 * Used to demonstrate multiple inheritance.
 * 
 * @author Ian Bradley 
 * @version 1.0
 */
public class ColourTriangleAmended extends TriangleAmended
{
    
    private String colour;

    /**
     * Constructor for objects of class ColourTriangle
     */
    public ColourTriangleAmended(String colour, String style, 
                                 double width, double length)
    {
        super(style, width, length);
        this.colour = colour;
        System.out.println("CT") ;
    }

    /**
     * gets the current value for colour
     * 
     * @return     the triangle colour
     */
    public String getColour()
    {
        return colour;
    }
    
    public String toString()
    {
        return "Colour is " + colour 
               + "Triangle is " + getStyle() 
               + " Width is " + getWidth() 
               + " Length is " + getLength();
    }
    

}
