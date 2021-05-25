
/**
 * Represents a person's personal account
 * To be used within Homework 3
 * 
 * @author Andrew Robson 
 * @version 13/03/2017
 */
public class PersonalAccount extends Account
{
    private String cardNumber; //Customer's card number
    private char cardType; //Customer's card type
    
    /**
     * Declaration for personal account without points
     * @param firstName the customer's first name
     * @param lastName the customer's last name
     * @param accountNumber the customer's account number
     * @param street the customer's street
     * @param town the customer's town
     * @param postcode the customer's postcode
     * @param cardNumber the customer's card number
     * @param cardType the customer's card type
     * @super this allows for additional usability held within the account class
     */
    public PersonalAccount( String firstName, String lastName, 
    String accountNumber, String street, String town, String postcode, 
    String cardNumber, char cardType)
    {
        super( firstName, lastName, accountNumber, street, town, postcode); 
        this.cardNumber = cardNumber;
        this.cardType = cardType;
    }
    
    /**
     * Declaration for personal account with points
     * @param firstName the customer's first name
     * @param lastName the customer's last name
     * @param accountNumber the customer's account number
     * @param street the customer's street
     * @param town the customer's town
     * @param postcode the customer's postcode
     * @param cardNumber the customer's card number
     * @param cardType the customer's card type
     * @param points the number of points the customer has
     * @super this allows for additional usability held within the account class
     */
    public PersonalAccount( String firstName, String lastName, 
    String accountNumber, String street, String town, String postcode, 
    String cardNumber, char cardType, int points)
    {
        super( firstName, lastName, accountNumber, points, street, town, postcode); 
        this.cardNumber = cardNumber;
        this.cardType = cardType;
    }
    
    /**
     * Returns the card number in a formatted display
     * @.substring this allows for a precise amount of characters to be 
     * selected
     * @return the card number
     */
    public String getCardNumber()
    {
        return cardNumber.substring(0, 4) + " " 
        + cardNumber.substring(4, 8) + " " 
        + cardNumber.substring(8, 12) + " " 
        + cardNumber.substring(12, 16);
    }
    
    /**
     * Returns the card type that the customer used
     * Also returns a string instead of a char
     * @return the card name
     */
    public String getCardType()
    {
       if(cardType == 'D')
       {
        String cardName = new String("Debit");
        return cardName;
       }
       else if(cardType == 'M')
       {
        String cardName = new String("Mastercard");
        return cardName;
       }
       else if(cardType == 'V')
       {
        String cardName = new String("Visa");
        return cardName;   
       }
       else
       {
        String cardName = new String("Unknown");
        return cardName;   
       }
    }
   
    /**
     * Prints out the toString method below
     */
    public void print()
    {
        System.out.println(toString());
    }
    
    /**
     * Used to gather all of the relevant information and allow for a 
     * formatted output
     * @return the formatted output
     */
    public String toString()
    {
        return "Personal " + super.toString() + "\nCard Number: " 
        + getCardNumber() + " " + "Card Type: " + getCardType() 
        + "\n";
    }
}