# REST Scheduler API

I developed this on the spec from WhenIWork.  Some of it is implemented, but I thought this would be a good point to start getting some code up for people to review and get a feel for my coding style, etc.

## Init

- git clone https://github.com/jwerd/restscheduler.git my-project
- run "composer install" from within the working directory
- copy ".env.example" to ".env" and set your database settings accordingly (we use mysql, by default)
- run "php artisan migrate" to migrate your tables
- run "php artisan db:seed" to set up some seed data to test with (optional)

## API Usage
Coming soon.

## Requirements

The API must follow REST specification:

- POST should be used to create
- GET should be used to read
- PUT should be used to update (and optionally to create)
- DELETE should be used to delete

Additional methods can be used for expanded functionality.

The API should include the following roles:

- employee (read)
- manager (write)

The `employee` will have much more limited access than a `manager`. The specifics of what each role should be able to do is listed below in [User Stories](#user-stories).

## User stories

**Please note that this not intended to be a CRUD application.** Only the functionality described by the user stories should be exposed via the API.

** Each item completed/supported will have a strike through it.

- [ ] ~~As an employee, I want to know when I am working, by being able to see all of the shifts assigned to me.~~
- [ ] As an employee, I want to know who I am working with, by being able to see the employees that are working during the same time period as me.
- [ ] As an employee, I want to know how much I worked, by being able to get a summary of hours worked for each week.
- [ ] ~~As an employee, I want to be able to contact my managers, by seeing manager contact information for my shifts.~~

- [ ] ~~As a manager, I want to schedule my employees, by creating shifts for any employee.~~
- [ ] As a manager, I want to see the schedule, by listing shifts within a specific time period.
- [ ] ~~As a manager, I want to be able to change a shift, by updating the time details.~~
- [ ] ~~As a manager, I want to be able to assign a shift, by changing the employee that will work a shift.~~
- [ ] ~~As a manager, I want to contact an employee, by seeing employee details.~~
