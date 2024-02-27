<script>
    const issueRelatedToSelect = document.getElementById('issue_related_to');
    const issueTypeSelect = document.getElementById('issue_type');
    const issueTypeDescription = document.getElementById('issue_type_description');

    issueRelatedToSelect.addEventListener('change', () => {
        const selectedValue = issueRelatedToSelect.value;
        // if (selectedValue == 4) {

        //      issueTypeDescription.innerHTML = '';

        //     const otherInput = document.createElement('input');
        //     otherInput.type = 'text';
        //     otherInput.name = 'issue_type';
        //     otherInput.placeholder = 'Enter other issue type...';
        //     otherInput.classList.add('form-control');
        //     issueTypeDescription.appendChild(otherInput);
        // }
        fetchIssueTypes(selectedValue);
    });

    function fetchIssueTypes(issueRelatedToId) {
        fetch(`/get-issue-types?issue_related_to=${issueRelatedToId}`)
            .then(response => response.json())
            .then(data => {
                populateIssueTypeOptions(data);
            })
            .catch(error => {
                console.error('Error fetching issue types:', error);
            });
    }

    function populateIssueTypeOptions(issueTypes) {
        issueTypeSelect.innerHTML = ''; // Clear existing options
        console.log(issueTypes);
        issueTypes.forEach(issueType => {
            // document.getElementById(issue_type).style.visibility = "visible";
            const optionElement = document.createElement('option');
            optionElement.value = issueType.id;
            optionElement.text = issueType.name;
            issueTypeSelect.appendChild(optionElement);

        });
    }

    // Initialize the 'Issue Type' options based on the initial value of 'Issue Related to'
    const initialIssueRelatedToValue = issueRelatedToSelect.value;
    fetchIssueTypes(initialIssueRelatedToValue);
</script>


