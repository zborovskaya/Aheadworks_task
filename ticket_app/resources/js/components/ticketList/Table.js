import React, {Component} from 'react';
import TableRow from "./TableRow";

class Table extends Component {

    constructor(props) {
        super(props);
        this.state = {
            tickets: [],
        }
    }

    componentDidMount() {
        this.getTicketList();
    }

    // Get Employee List.
    getTicketList = () => {
        var self = this;
        axios.get('/api/ticket')
            .then(function (response) {
                self.setState({tickets: response.data})
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <table className="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" width="200px">uid</th>
                                    <th scope="col" width="200px">Subject</th>
                                    <th scope="col" width="200px">Name</th>
                                    <th scope="col" width="200px">Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                {
                                    this.state.tickets.map(function (x, i) {
                                        return <TableRow key={i} data={x}/>
                                    })
                                }
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}


export default Table;

