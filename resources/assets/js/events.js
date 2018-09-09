import React from 'react';
import ReactDom from 'react-dom';

class EventRow extends React.Component {
    render() {
        return (
            <tr>
                <td>{this.props.event.id}</td>
                <td>{this.props.event.description}</td>
                <td>{this.props.event.event_type}</td>
                <td>{this.props.event.event_time}</td>
                <td>{this.props.event.venue}</td>
                <td>{this.props.event.driving_distance + ' / ' + this.props.event.driving_duration} </td>
                <td>{this.props.event.walking_distance + ' / ' + this.props.event.walking_duration} </td>
                <td>
                    <a href={"events/" + this.props.event.id + "/organisers"}><button className="btn-sm btn-primary">Organisers</button></a>
                    <a href={"events/" + this.props.event.id + "/participants"}><button className="btn-sm btn-primary">Invited</button></a>
                    <a href={"events/" + this.props.event.id + "/edit"}><button className="btn-sm btn-primary">Edit</button></a>
                    <a href={"events/delete/" + this.props.event.id}><button className="btn-sm btn-primary">Delete</button></a>
                </td>
            </tr>
        );
    }
}

class EventTable extends React.Component {
    render() {

        var rows = [];

        this.props.events.forEach((event) => {

            if(event.description.indexOf(this.props.filterText) === -1 || event.event_time.indexOf(this.props.filterDateTime) === -1 || event.venue.indexOf(this.props.filterVenue) === -1 || (this.props.filterType && this.props.filterType != event.event_type_id)) {
                return;
            }

            rows.push(<EventRow event={event} key={event.id}/>);
        });

        return (
            <table className="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Time</th>
                    <th>Venue</th>
                    <th>Driving</th>
                    <th>Walking</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                {rows}
                </tbody>

            </table>
        );
    }
}

class EventTypeOption extends React.Component {
    render() {
        return (
            <option value={this.props.value}>{this.props.name}</option>
        );
    }
}



class Filter extends React.Component {

    constructor(props) {
        super(props);
        this.handleFilterTextChange = this.handleFilterTextChange.bind(this);
        this.handleFilterTypeChange = this.handleFilterTypeChange.bind(this);
        this.handleFilterDateTimeChange = this.handleFilterDateTimeChange.bind(this);
        this.handleFilterVenueChange = this.handleFilterVenueChange.bind(this);
    }

    handleFilterTextChange(e) {
        this.props.onHandleFilterTextChange(e.target.value);
    }

    handleFilterDateTimeChange(e) {
        this.props.onHandleFilterDateTimeChange(e.target.value);
    }

    handleFilterVenueChange(e) {
        this.props.onHandleFilterVenueChange(e.target.value);
    }

    handleFilterTypeChange(e) {
        this.props.onHandleFilterTypeChange(e.target.value);
    }

    render() {

        var options = [<EventTypeOption value={0} name={'All'} key={0}/>];

        this.props.eventTypes.forEach((event) => {

            options.push(<EventTypeOption value={event.id} name={event.name} key={event.id}/>);
        });

        return (
            <form className="form-inline">
                <div className="form-group col-sm-2 col-md-2 col-lg-2">
                    <input type="text" className="form-control" value={this.props.filterText} onChange={this.handleFilterTextChange} placeholder="Filter By Description" />
                </div>
                <div className="form-group col-sm-2 col-md-2 col-lg-2">
                    <span>Filter by type</span>
                    <select  className="form-control" value={this.props.filterType} onChange={this.handleFilterTypeChange}>
                        {options}
                    </select>
                </div>
                <div className="form-group col-sm-2 col-md-2 col-lg-2">
                    <input type="text" className="form-control" value={this.props.filterDateTime} onChange={this.handleFilterDateTimeChange} placeholder="Filter By Datetime" />
                </div>
                <div className="form-group col-sm-2 col-md-2 col-lg-2">
                    <input type="text" className="form-control" value={this.props.filterVenue} onChange={this.handleFilterVenueChange} placeholder="Filter By Venue" />
                </div>
            </form>
        );
    }
}

class SearchAbleEvent extends React.Component {
    constructor(props) {
        super(props);
        var self = this;

        this.filterTextChange = this.filterTextChange.bind(this);
        this.filterTypeChange = this.filterTypeChange.bind(this);
        this.filterDateTimeChange = this.filterDateTimeChange.bind(this);
        this.filterVenueChange = this.filterVenueChange.bind(this);

        this.state = {
            filterText: '',
            filterDateTime: '',
            filterVenue: '',
            filterType: 0,
            events: this.props.events
        }
    }

    filterTextChange(filterText) {
        this.setState({
            filterText: filterText
        });
    }

    filterDateTimeChange(filterDateTime) {
        this.setState({
            filterDateTime: filterDateTime
        });
    }

    filterVenueChange(filterVenue) {
        this.setState({
            filterVenue: filterVenue
        });
    }

    filterTypeChange(filterType) {
        this.setState({
            filterType: parseInt(filterType)
        });
    }

    render() {
        return(
            <div>
                <Filter filterText={this.state.filterText} filterDateTime={this.state.filterDateTime} filterVenue={this.state.filterVenue} filterType={this.state.filterType} eventTypes={this.props.eventTypes} onHandleFilterTextChange={this.filterTextChange} onHandleFilterDateTimeChange={this.filterDateTimeChange} onHandleFilterVenueChange={this.filterVenueChange} onHandleFilterTypeChange={this.filterTypeChange}/>
                <EventTable events={this.state.events} filterText={this.state.filterText} filterDateTime={this.state.filterDateTime} filterVenue={this.state.filterVenue} filterType={this.state.filterType}/>
            </div>
        );
    }
}

ReactDom.render(
    <SearchAbleEvent events={events} eventTypes={eventTypes}/>,
    document.getElementById('events')
);