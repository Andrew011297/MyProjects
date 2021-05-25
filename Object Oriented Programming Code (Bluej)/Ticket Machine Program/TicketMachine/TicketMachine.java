/**
 * A simple ticket machine
 * @author Andrew Robson
 * @version 23/01/2017
 */
public class TicketMachine
{
    // Declare attributes
    private int price;      // The price of a ticket
    private int balance;    // The remaining ticket balance
    private int total;      // The total in the machine
    
    /**
     * Create a ticket machine to issue tickets of a
     * given price which must be greater than zero.
     *
     * @param ticketCost the cost of a ticket 
     */
    public TicketMachine(int ticketCost)
    {
        price = ticketCost;
        balance = 0;
        total = 0;
    } // end constructor

    /**
    * Return the price of a ticket.
    *
	* @return the price of a ticket
    */
    public int getPrice()
    {
	  	 return price;
    }
    
    /**
     * Return the amount of money already inserted for the
     * next ticket.
     * 
     * @return the amount already inserted for the next ticket
     */
    public int getBalance()
    {
        return balance;
    }

    /**
     * Print a ticket.
     * Update the total collected and
     * reduce the balance to zero.
     */
    public void printTicket()
    {
        // Simulate the printing of a ticket.
        System.out.println("##################");
        System.out.println("# The BlueJ Line");
        System.out.println("# Ticket");
        System.out.println("# " + price + " pence.");
        System.out.println("##################");
        System.out.println();

        // Update the total collected with the amount paid.
        total = total + balance;
        // Clear the balance.
        balance = 0;
    }
    /**
    * Return the total
    * @return the total value
    */
    public int getTotal()
    {
        return total;
    }
    /**
     * Recieva an amount of money in pence
     * from a customer and add to balance
     * 
     * @param amount value of money entered 
     */
    public void insertMoney(int amount)
    {
        balance = balance + amount;
    }
    /**
     * Set the value of ticket
     * @param ticketCost value of ticket
     */
    public void setPrice(int ticketCost)
    {
        price = ticketCost;
    }
    public void prompt()
    {
        System.out.println("Please insert the correct amount of money");
    }
    public void showPrice()
    {
        System.out.println("the price of a ticket is " + price + " pence");
    }
} // end of class










