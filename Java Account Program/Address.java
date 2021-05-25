
/**
 * Address class for homework 2 of CG0048
 * 
 * equals and toString methods added
 * 
 * @author Alan Maughan
 * @version 02
 */
public class Address
{
    private String street;
    private String town;
    private String postcode;
    
    /**
     * Constructor for objects of class Address
     * 
     * @param street the street
     * @param town the town
     * @param postcode the postcode
     */
    public Address(String street, String town, String postcode)
    {
        this.street = street;
        this.town = town;
        this.postcode = postcode;        
    }
    
    /**
     * returns the street
     * 
     * @return the street
     */
    public String getStreet()
    {
        return street;
    }
    
    /**
     * Returns the town
     * 
     * @return the town
     */
    public String getTown()
    {
        return town;
    }
    
    /**
     * Returns the postcode
     * 
     * @return the postcode
     */
    public String getPostcode()
    {
        return postcode;
    }
    
    /**
     * Returns the formatted address
     * one element to a line
     * 
     * @return the formatted address
     */
    public String toString()
    {
        String output = "";
        output = street + ", " + town + ", " + postcode;
        return output;
    }
    
    /**
     * Set the street
     * 
     * @param Street the street
     */
    public void setStreet(String street)
    {
        this.street = street;
    }
    
     /**
     * Set the town
     * 
     * @param town the town
     */
    public void setTown(String town)
    {
        this.town = town;
    }
    
     /**
     * Set the postcode
     * 
     * @param postcode the postcode
     */
    public void setPostcode(String postcode)
    {
        this.postcode = postcode;
    }
    
     /**
     * Set the full address
     * 
     * @param street the street
     * @param town the town
     * @param postcode the postcode
     */
    public void setFullAddress(String street, String town, String postcode)
    {
        this.street = street;
        this.town = town;
        this.postcode = postcode;
    }
    
    /** 
     * print formatted address to console window
     */
    public void printAddress()
    {
        System.out.println(toString());
    }
    
     /**
     * Compares two Addresses based on the toString method
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
         
        Address other = (Address) o;        
         
        if (other.toString().equals( toString()))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
