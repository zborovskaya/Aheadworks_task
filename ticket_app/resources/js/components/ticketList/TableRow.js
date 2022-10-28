import React, {Component} from 'react';

class TableRow extends Component {
    constructor(props) {
        super(props);
    }
    render() {
        return (
            <tr>
                <th scope="col" width="200px">{this.props.data.uid}</th>
                <td scope="col" width="200px">{this.props.data.subject}</td>
                <td scope="col" width="200px">{this.props.data.user_name}</td>
                <td scope="col" width="200px">{this.props.data.user_email}</td>
            </tr>
        );
    }
}


export default TableRow;

