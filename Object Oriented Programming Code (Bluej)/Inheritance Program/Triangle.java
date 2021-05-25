
/**
 * Write a description of class Triangle here.
 * 
 * @author (your name) 
 * @version (a version number or a date)
 */
public class Triangle extends TwoDShapeForLab
{
    private String style;
    
    public Triangle( String style, double width, double length)
    {
        super(width, length);
        this.style = style;
    }
    
    public double area()
    {
        return getWidth() * getLength() / 2.0;
    }
    
    public String getStyle()
    {
        return style;
    }
    
    public void printStyle()
    {
        System.out.println("Triangle is " + style);
    }
    
    public String toString()
    {
        "Width is " + width + " length is " + length +
        "Style is " + style

    } 

}
