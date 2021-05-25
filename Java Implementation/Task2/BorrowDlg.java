import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import java.util.*;

/**
 * BorrowDlg is a custom class to add functionality to issue items on loan to a borrower
 * BorrowDlg has been created to fulfill the needs of the specification
 * 
 * @author Andrew Robson W16011147
 * @version 1.0
 */
public class BorrowDlg extends JDialog implements ActionListener 
{
    private MainMenu parent;
    private JTextField borrowerField, itemField;
    private JButton submitButton, cancelButton;

    /**
     * This method is primarily used to create the GUI
     * creates the panels
     * creates the buttons
     * creates the text fields
     * adds action listeners to the buttons
     */
    public BorrowDlg(MainMenu p)
    {
        setTitle("Register Loan of an Item");
        parent = p; //Parent is MainMenu

        borrowerField = new JTextField(10);//sets the borrowerField attribute
        itemField = new JTextField(10);//sets the itemField attribute
        submitButton = new JButton("Submit");//sets the submit button
        cancelButton = new JButton("Cancel");//sets the cancelButton

        //Creates the panel and adds all the text fields and labels
        JPanel thePanel = new JPanel();
        thePanel.add(new JLabel("Borrower ID:"));
        thePanel.add(borrowerField);
        thePanel.add(new JLabel("Item ID:"));
        thePanel.add(itemField);
        add(thePanel, BorderLayout.CENTER);//Will display in the center of the panel

        //Creates the panel and adds the buttons to it
        thePanel = new JPanel();
        thePanel.add(submitButton);
        thePanel.add(cancelButton);
        add(thePanel, BorderLayout.SOUTH);//Will display south of the panel

        setBounds(200, 200, 800, 200);//Sets the dimensions 

        submitButton.addActionListener(this);//adds an actionListener to the submit button
        cancelButton.addActionListener(this);//adds an actionListener to the cancel button
    }

    /**
     * Assigns all of the fnctionality to the buttons when they are pressed
     */
    public void actionPerformed(ActionEvent evt)
    {
        Object src = evt.getSource();//sets the src variable
        if (src == submitButton) 
        {
            processLoan();//calls the processLoan function
            borrowerField.setText("");
            itemField.setText("");
        }
        else if (src == cancelButton)
        {
            setVisible(false);//Hides the panel
            borrowerField.setText("");
            itemField.setText("");
        }
    }

    /**
     * Implements all of the functionality that has been declared in the specification
     * Particularly the requirements relevent to part 1
     * Displays errors to the user in the panel
     */
    public void processLoan()
    {
        try
        {
            Integer borrowerID = new Integer(borrowerField.getText());
            Borrower borrower = parent.getBorrowers().get(borrowerID);
            Integer itemID = new Integer (itemField.getText());
            Item item = parent.getItems().get(itemID);
            if (borrower == null)//If borrowe is null then do the following
            {
                //Displays an error
                JOptionPane.showMessageDialog(this, "Borrower could not be found",
                    " Error: ", JOptionPane.ERROR_MESSAGE);
                return;
            }

            if (item == null)//If item is null then do the following
            {
                //Displays an error
                JOptionPane.showMessageDialog(this, "Item could not be found", 
                    " Error: ", JOptionPane.ERROR_MESSAGE);
                return;
            }

            Borrower isBorrowed = item.getBorrowedBy();

            if (isBorrowed != null)//If isBorrowed is not null then do the following
            {
                //Displays an error
                JOptionPane.showMessageDialog(this, "Item is on loan", 
                    " Error: ", JOptionPane.ERROR_MESSAGE);
                return;
            }

            for(LoanTransaction loan: parent.getLoans()) {//for every loan do the following
                if (borrower.equals(loan.getBorrower()))//If these two values are equal then do the following
                {
                    if((System.currentTimeMillis() - loan.getTimeStamp()) > parent.getLOANMAX())
                    //Takes the time in milliseconds, removes the timeStamp variable and compares it to LOANMAX
                    //which is in the MainMenu class
                    {
                        //Displays an error
                        JOptionPane.showMessageDialog(this, "One or more loans have been discovered as overdue", 
                            " Error: ", JOptionPane.ERROR_MESSAGE);
                        return;
                    }
                }
            }

            //adds a new loan transaction
            parent.getLoans().add(new LoanTransaction(borrower, item, System.currentTimeMillis()));

            item.setBorrowedBy(borrower);//links the item with a borrower

            System.out.println("Loan has been successfully created");//Prints to console
        }
        catch (NumberFormatException ex)
        {
            //Displays error
            JOptionPane.showMessageDialog(this, ex.getMessage(), "Number format error", JOptionPane.ERROR_MESSAGE);
        }
    }
}

