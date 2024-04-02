<?php
// Define the namespace for this class
namespace App\Livewire;

// Import necessary classes
use Illuminate\Support\Carbon;
use Livewire\Component;

// Define the FormComponent class which extends the Livewire Component class
class FormComponent extends Component
{
    // Define public properties for form fields
    // These properties will hold the data entered by the user in the form

    // Form Step 1 Fields
    public $first_name; // First name of the user
    public $last_name; // Last name of the user
    public $address; // Address of the user
    public $city; // City of the user
    public $country; // Country of the user
    public $dob_month; // Month of birth of the user
    public $dob_day; // Day of birth of the user
    public $dob_year; // Year of birth of the user

    // Form Step 2 Fields
    public $married; // Marital status of the user
    public $dom_month; // Month of marriage of the user
    public $dom_day; // Day of marriage of the user
    public $dom_year; // Year of marriage of the user
    public $country_of_marriage; // Country of marriage of the user
    public $widowed; // Widow status of the user
    public $married_before; // Previous marriage status of the user

    // Define a property to hold the current page of the form
    public $currentPage = 1;

    // Define a property to hold the marital status of the user
    public bool $isMarried = false;

    // Define a method to update the marital status of the user
    public function updateMarried() {
        // handle changes in the marital status
        // forces a re-render of the component
    }

    // Define the render method which returns the view for this component
    public function render()
    {
        // Return the view for this component
        return view('livewire.form-component');
    }

    // Define the submit method which handles the form submission
    public function submit()
    {
        // Validate the form data
        // This is a simple example, I would add more complex validation logic in a method and call it here

        // Marital status
        if ($this->married === 'yes') {
            // If the user is married, validate the age at the time of marriage
            if (!$this->validateMarriageAge()) {
                // If the user was not old enough at the time of marriage, return early
                return;
            }
        } elseif ($this->married === 'no') {
            // If the user is not married, you can add additional logic here if necessary
        }

        // Store the form data in the session
        session([
            'formData' => [
                'First Name' => $this->first_name,
                'Last Name' => $this->last_name,
                'Address' => $this->address,
                'City' => $this->city,
                'Country' => $this->country,
                'Date of Birth' => $this->dob_year . '-' . $this->dob_month . '-' . $this->dob_day,
                'Married' => $this->married,
                'Date of Marriage' => $this->dom_year . '-' . $this->dom_month . '-' . $this->dom_day,
                'Country of Marriage' => $this->country_of_marriage,
                'Widowed' => $this->widowed,
                'Married Before' => $this->married_before,
            ]
        ]);

        // Redirect to a route that displays the form data
        return redirect()->to('/form-results');
    }

    // Define a method to go to the next page of the form
    public function goToNextPage()
    {
        // Increment the current page
        $this->currentPage++;
    }

    // Define a method to go to the previous page of the form
    public function goToPreviousPage()
    {
        // Decrement the current page
        $this->currentPage--;
    }

    // Define a method to validate the age at the time of marriage
    public function validateMarriageAge()
    {
        // Create Carbon instances for the date of birth and the date of marriage
        $dob = Carbon::createFromDate($this->dob_year, $this->dob_month, $this->dob_day);
        $dom = Carbon::createFromDate($this->dom_year, $this->dom_month, $this->dom_day);

        // Calculate the age at the time of marriage
        $ageAtMarriage = $dob->diffInYears($dom);

        // If the age at the time of marriage was less than 18, add an error and return false
        if ($ageAtMarriage < 18) {
            $this->addError('dom', 'You are not eligible to apply because your marriage occurred before your 18th birthday.');
            return false;
        }

        // If the age at the time of marriage was 18 or more, return true
        return true;
    }
}
