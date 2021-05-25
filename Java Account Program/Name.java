
/**
 * Represents a person's name which may be in 2 or 3 elements:
 * first [second] last name.
 * 
 * @author Ian Bradley. Amended by A Maughan 
 * to add full name functionality
 * 
 * Amended to use toString() and equals()
 * 
 * @version 10/11/2014
 */
public class Name
{
    private String first;
    private String second;
    private String last;

    /**
     *  Constructor for objects of class Name
     *  Only a first and last name
     *  
     *  @param first    the first name
     *  @param last     the last name
     */
    public Name(String first, String last)
    {
        this.first = first;
        this.last = last;
    }
    
    /**
     *  Constructor for objects of class Name
     *  first, second and last name
     *  
     *  @param first    the first name
     *  @param second   the middle name
     *  @param last     the last name
     */
    public Name(String first, String second, String last)
    {
        this.first = first;
        this.second = second;
        this.last = last;
    }

    /**
     * Returns the first name
     * 
     * @return     the first name 
     */
    public String getFirst()
    {
        return first;
    }
    
    /**
     * Returns the second name
     * 
     * @return     the second name 
     */
    public String getSecond()
    {
      return second;           
    }
    
    /**
     * Returns the last name
     * 
     * @return     the last name 
     */
    public String getLast()
    {
        return last;
    }
    
    /**
     * Returns the full name name. Allows for any element being null.
     * 
     * @return     the full name 
     */
    public String toString()
    {
        String name = "";
        if ( first != null )
        {
           name = name + first;
        }
        if ( second != null )
        {
           name = name + " " + second;
        }
        if ( last != null )
        {
           name = name + " " + last;
        }
        return name;
    }
    
    /**
     * Set the first name
     * 
     * @param  first   the first name
     */
    public void setFirst( String first )
    {
       this.first = first;
    }
    
    /**
     * Set the second name
     * 
     * @param  second   the second name
     */
    public void setSecond( String second )
    {
       this.second = second;
    }
    
    /**
     * Set the last name
     * 
     * @param  last   the last name
     */
    public void setLast( String last )
    {
       this.last = last;
    }
    
    /* There are two versions of the method setFirstName
     * One to handle a 2-part name and the other a 3-part name
     * 
     * Methods can have the same name as long as 
     * the method signatures are different:
     *    void setFullName(String, String)
     *    void setFullName(String, String, String)
     *  
     * This is known as 'method overloading'.
     */
    
    /**
     * Set the full name where there is no second name
     * 
     * @param first     the first name
     * @param last      the last name
     */
    public void setFullName(String first, String last)
    {
       setFirst(first);
       setLast(last);        
    }
    
    /**
     * Set the full name where there is a second name
     * 
     * NOTE: If this method chosen & there is no second name then 
     * null would have to be entered as the value.
     * 
     * @param first     the first name
     * @param second    the second name
     * @param last      the last name
     */
    public void setFullName(String first, String second, String last)
    {
       setFirst(first);
       setSecond(second);
       setLast(last);        
    }
    
    /**
     * Compares two Names based on the toString method
     * 
     * @return true if names are equal, false otherwise
     */
    public boolean equals( Object o) 
    {     
        if ( o == null)  
        {
            return false;      
        }
        
        if ( this == o)
        {
            return true;   
        }
         
        Name other = (Name) o;        
         
        if (other.toString().equals( toString()))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
  } // end Name class
