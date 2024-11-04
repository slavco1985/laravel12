import React, { useState } from 'react';
import Input from '@/Components/Input';
import { useForm, Link } from '@inertiajs/react';
import User from '@/Layouts/User';
import TabLink from './Shared/TabLink';
import Swal from 'sweetalert2';
import Path from '../Shared/Path';



const Gallery = (props) =>{

    const [active, setActive] = useState('gallery');
    const [typ, setTyp] = useState('');
    const [lid, setLid] = useState(props.lid)
    const [gallery, setGallery] = useState(props.gallery);
    const { data, setData, post, processing, errors, reset, clearErrors, delete: destroy  } = useForm({
        image: '',
        lid: props.lid 
    });

    const handleFile = (event) =>{
        setData(event.target.name, event.target.files[0]);
    }

    const handleSubmiton = (e) =>{
        e.preventDefault();
        post(route('gallery.store'),{
            preserveState: (page) => Object.keys(page.props.errors).length,
        });
    }

    const removeImage = i => () =>{
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                destroy(route('gallery.destroy', gallery[i].id),{
                    onSuccess: () => {
                        Swal.fire('Deleted!','Image Removed Sucessfully','success',);
                    },
                    preserveState:false
                });
            }
        })
    }

    return (
        <User>
        <Path title="Business Gallery" />
        <div className="container">
            <div className="row new-listing">
                <div className="col-md-10 p-0 listing-col mx-auto">
                    <div className="card shadow text-center">
                        <div className="card-header p-0">
                             <TabLink active={active} typ={typ} lid={lid}  />
                        </div>
                        <div className="card-body tab-content p-0">
                            <div className="form-container ">
                                {
                                    errors.limit && 
                                        <div className="alert mb-4 alert-danger" role="alert">
                                            You reached your Maximum Limit 
                                            <Link className='fw-bolder text-decoration-underline' href={route('choos-package')}> Upgrade your plan </Link> 
                                            to add more
                                        </div>
                                }
                                <div className="row form-row">
                                    <form onSubmit={handleSubmiton}>
                                        <div className="row form-row">
                                            <div className="col-md-4">
                                                <Input type='file' className={errors.image && 'inerror'} name="image" handleChange={handleFile} />
                                                {errors.image &&  <div className="smart-valid">{errors.image}</div> }
                                            </div>
                                            <div className="col-md-2">
                                                <button disabled={processing} type='submit' className="btn btn-primary">Add Image</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div className="row pb-1">
                                        {
                                            gallery && gallery.map((g, i)=>{
                                                return <div key={i} className="col-md-2 mb-4">
                                                            <div className="img-cover">
                                                                <img src={g.image} alt="" />
                                                            </div>
                                                            <button onClick={removeImage(i)} className="btn btn-danger w-100 btn-sm">Remove</button>
                                                        </div>
                                            })
                                        }
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="card-footer text-muted">
                            <div className="row">
                                <div className="col-md-6 pt-2 left">
                                    <p>Step 6 of 7</p>
                                </div>
                                <div className="col-md-6 right">
                                    <Link href={route('user-dashboard')}>
                                        <button className="btn  btn-light">Skip and Go to Dashboard</button> 
                                    </Link>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
     </User>
    )
}
export default Gallery;