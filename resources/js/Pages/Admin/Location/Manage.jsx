import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import EditLocation from './EditLocation';
import LocationForm from './LocationForm';
import { Modal } from 'bootstrap';
import Swal from 'sweetalert2';
import { useForm } from '@inertiajs/react';

const Manage = (props) =>{
    const { put } = useForm()
    const [location, setLocation] = useState(props.location);
    const [edit, setEdit] = useState({name:''})
    const [mymodel, setMymodel] = useState([]);
    const { delete: destroy } = useForm();

    let modal = [];
    useEffect(()=>{
        
    })
    

    const updateLocation = i => () =>{
        var modal = new Modal(document.getElementById('myModal'), {
            keyboard: false
        })
        modal.show()
        setMymodel(modal);
        setEdit(location[i]);
    }

    const deleteLocation = id => () =>{
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                destroy(route('location.destroy', id),{
                    onSuccess: () => {
                        // setLocation((ps)=>{
                        //     return ps.filter(loc => loc.id != id);
                        // })
                        Swal.fire('Deleted!','Location Removed Successfully','success');
                    },
                    preserveState:false
                });
            }
          })
    }

    const updateFeatured = i =>() =>{
        location[i].featured = !location[i].featured;
        put(route('update-location-featured', location[i]));
    }
    

    return(
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Manage Location" path="Location" pathurl="" />
            <Panel title="Add Location" md="6">
                <LocationForm  />
                <div className="table-responsive-md">
                    <table className='table'>
                        <tbody>
                            <tr>
                                <th className='slno text-center'>ID</th>
                                <th>Image</th>
                                <th>City Name</th>
                                <th className='center'>Featured</th>
                                <th className='text-end pe-5'>Action</th>
                            </tr>
                            {
                                location && location.map((l, i)=>{
                                    return <tr  key={i}>
                                        <td className='slno text-center'>{l.id}</td>
                                        <td className='locationimage'>
                                            <img src={l.image} alt={l.name} />
                                        </td>
                                        <td >{l.name}</td>
                                        <td className='center'>
                                            {
                                                l.featured == 0 ? 
                                                    <i onClick={updateFeatured(i)} className="bi text-primary fs-4 bi-toggle-off"></i> 
                                                : 
                                                    <i onClick={updateFeatured(i)} className="bi text-primary fs-4 bi-toggle-on"></i>
                                            }
                                            
                                        </td>
                                        <td className='text-end pe-3 action'>
                                            <button onClick={updateLocation(i)} className="btn btn-primary btn-xs"><i className="bi bi-pencil-square"></i> Edit</button>
                                            <button onClick={deleteLocation(l.id)} className="btn btn-danger btn-xs"><i className="bi bi-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                })
                            }
                        </tbody>
                    </table>
                </div>
            </Panel>
            <EditLocation edit={edit} mymodel={mymodel}  />
        </Authenticated>
    )
}

export default Manage