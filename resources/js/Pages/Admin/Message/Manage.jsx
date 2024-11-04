import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import Pagination from '@/Core/Pagination';
import Swal from 'sweetalert2';
import { router } from '@inertiajs/react';


const Manage = (props) =>{

    const [message, setMessage] = useState(props.messages.data);
    const [links, setLinks] = useState(props.messages.links);
    const [activepage, setActivePage] = useState('');

    const removeMessage = id => () =>{
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                router.delete(route('message.destroy', id),{
                    onSuccess: () => {
                        setMessage((ps)=>{
                            return ps.filter(loc => loc.id != id);
                        })
                        Swal.fire('Deleted!','Message Removed Successfully','success');
                    },
                    preserveState:true
                });
            }
        })
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="View Messages" path="" pathurl="" />
            <Panel title="View Messages" md="12">
            <div className="table-responsive-md">
                <table className='table mb-0'>
                    <tbody>
                        <tr>
                            <th className='text-center'>#</th>
                            <th>Full Name</th>
                            <th>Mobile Number</th>
                            <th>Email Address</th>
                            <th>Message</th>
                            <th >Action</th>
                        </tr>
                        {
                            message && message.map((m, i)=>{
                                return <tr key={i}>
                                            <td className='center'>{i + props.messages.from}</td>
                                            <td>{ m.name }</td>
                                            <td>{ m.mobile }</td>
                                            <td>{ m.email }</td>
                                            <td>{ m.message } </td>
                                            <td className='acn'>
                                                <button onClick={removeMessage(m.id)} className="btn btn-sm btn-danger"><i className='bi bi-trash'></i> Delete</button>
                                            </td>
                                        </tr>
                            })
                        }
                    </tbody>
                </table>
            </div>
                { 
                    links.length === 3 ? '' :
                        <div className="card-footer">
                            <div className="row">
                                <div className="col-md-6 pt-2">
                                    
                                </div>
                                <div className="col-md-6 d-flex justify-content-end">
                                    <Pagination links={links} />
                                </div>
                            </div>
                            
                        </div>
                }  
            </Panel>
        </Authenticated>
    )
}
export default Manage