import React, { useState } from 'react';
import Input from '@/Components/Input';
import { useForm, Link } from '@inertiajs/react';
import User from '@/Layouts/User';
import TabLink from './Shared/TabLink';
import Swal from 'sweetalert2';
import Path from '../Shared/Path';

const Timing = (props) =>{
    const [active, setActive] = useState('timing');
    const [typ, setTyp] = useState('');
    const [lid, setLid] = useState(props.lid)
    const [timing, setTiming] = useState(props.timing);

    const { data, setData, post, put, processing, errors, reset, clearErrors } = useForm({
        monday_from: timing.monday_from || '', 
        monday_to: timing.monday_to || '', 
        tuesday_from: timing.tuesday_from || '', 
        tuesday_to: timing.tuesday_to || '', 
        wednesday_from: timing.wednesday_from || '', 
        wednesday_to: timing.wednesday_to || '', 
        thursday_from: timing.thursday_from || '', 
        thursday_to: timing.thursday_to || '', 
        friday_from: timing.friday_from || '', 
        friday_to: timing.friday_to || '', 
        saturday_from: timing.saturday_from || '', 
        saturday_to: timing.saturday_to || '', 
        sunday_from: timing.sunday_from || '', 
        sunday_to: timing.sunday_to || '', 
        facebook: timing.facebook || '', 
        twitter: timing.twitter || '', 
        youtube: timing.youtube || '', 
        pintrest: timing.pintrest || '', 
        instagram: timing.instagram || '', 
        linkedin: timing.linkedin || '', 
        iframe:timing.iframe || '', 
    });

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    };

    const saveTiming = (e) =>{
        e.preventDefault();
        put(route('timing.update', lid),{
            onSuccess: () => {
                Swal.fire('Saved!','Details Saved Sucessfully','success',);
            },
            preserveState: (page) => Object.keys(page.props.errors).length,
        });
    }

    return (
        <User>
            <Path title="Extra Details" />
            <div className="container">
                <div className="row new-listing">
                    <div className="col-md-10 p-0 listing-col mx-auto">
                        <div className="card shadow text-center">
                            <div className="card-header p-0">
                                <TabLink active={active} typ={typ} lid={lid}  />
                            </div>
                            <div className="card-body tab-content p-0">
                                <form className='p-4' onSubmit={saveTiming}>
                                    <h4 className='mb-4 text-start fs-5'>Business Timing</h4>
                                    <div className="row form-row">
                                        <div className="col-md-2 timeform">
                                            <label htmlFor="">Monday</label>
                                            <span className="spcol">:</span>
                                        </div>
                                        <div className="col-md-2 timeform">
                                            <Input type="time" name="monday_from" value={data.monday_from}
                                                 handleChange={onHandleChange}/>
                                        </div>
                                        <div className="col-md-2 timeform">
                                            <Input type="time" name="monday_to" value={data.monday_to}
                                                 handleChange={onHandleChange}/>
                                        </div>
                                        <div className="col-md-2 timeform">
                                            <label htmlFor="">Tuesday</label>
                                            <span className="spcol">:</span>
                                        </div>
                                        <div className="col-md-2 timeform">
                                            <Input type="time" name="tuesday_from" value={data.tuesday_from}
                                                 handleChange={onHandleChange}/>
                                        </div>
                                        <div className="col-md-2 timeform">
                                            <Input type="time" name="tuesday_to" value={data.tuesday_to}
                                                 handleChange={onHandleChange}/>
                                        </div>
                                    </div>  
                                    <div className="row form-row">
                                        <div className="col-md-2 ">
                                            <label htmlFor="">Wednesday</label>
                                            <span className="spcol">:</span>
                                        </div>
                                        <div className="col-md-2 timeform">
                                            <Input type="time" name="wednesday_from" value={data.wednesday_from}
                                                 handleChange={onHandleChange}/>
                                        </div>
                                        <div className="col-md-2 timeform">
                                            <Input type="time" name="wednesday_to" value={data.wednesday_to}
                                                 handleChange={onHandleChange}/>
                                        </div>
                                        <div className="col-md-2">
                                            <label htmlFor="">Thursday</label>
                                            <span className="spcol">:</span>
                                        </div>
                                        <div className="col-md-2 timeform">
                                            <Input type="time" name="thursday_from" value={data.thursday_from}
                                                 handleChange={onHandleChange}/>
                                        </div>
                                        <div className="col-md-2 timeform">
                                            <Input type="time" name="thursday_to" value={data.thursday_to}
                                                 handleChange={onHandleChange}/>
                                        </div>
                                    </div>  
                                    <div className="row form-row">
                                        <div className="col-md-2">
                                            <label htmlFor="">Friday</label>
                                            <span className="spcol">:</span>
                                        </div>
                                        <div className="col-md-2 timeform">
                                            <Input type="time" name="friday_from" value={data.friday_from}
                                                 handleChange={onHandleChange}/>
                                        </div>
                                        <div className="col-md-2 timeform">
                                            <Input type="time" name="friday_to" value={data.friday_to}
                                                 handleChange={onHandleChange}/>
                                        </div>
                                        <div className="col-md-2">
                                            <label htmlFor="">Saturday</label>
                                            <span className="spcol">:</span>
                                        </div>
                                        <div className="col-md-2 timeform">
                                            <Input type="time" name="saturday_from" value={data.saturday_from}
                                                 handleChange={onHandleChange}/>
                                        </div>
                                        <div className="col-md-2 timeform">
                                            <Input type="time" name="saturday_to" value={data.saturday_to}
                                                 handleChange={onHandleChange}/>
                                        </div>
                                    </div> 
                                    <div className="row form-row">
                                        <div className="col-md-2">
                                            <label htmlFor="">Sunday</label>
                                            <span className="spcol">:</span>
                                        </div>
                                        <div className="col-md-2 timeform">
                                            <Input type="time" name="sunday_from" value={data.sunday_from}
                                                 handleChange={onHandleChange}/>
                                        </div>
                                        <div className="col-md-2 timeform">
                                            <Input type="time" name="sunday_to" value={data.sunday_to}
                                                 handleChange={onHandleChange}/>
                                        </div>
                                        <div className="col-md-2">
                                           
                                        </div>
                                        <div className="col-md-4">
                                           
                                        </div>
                                    </div>  

                                    <h4 className='mb-0 text-start fs-5'>Add Map Ifram URL</h4>
                                    <p className='text-start mb-3'><small>Note:- Don't add the full Iframe code. <b>Only Enter the Iframe URL</b></small></p>
                                    <div className="row form-row">
                                        <div className="col-md-2">
                                            <label htmlFor="">Ifram URL</label>
                                            <span className="spcol">:</span>
                                        </div>
                                        <div className="col-md-6">
                                            <textarea name="iframe" value={data.iframe} className={`${errors.iframe && 'inerror'} form-control form-control-sm`} onChange={onHandleChange} rows="3"></textarea>
                                            {errors.iframe &&  <div className="smart-valid">{errors.iframe}</div> }
                                        </div>
                                        <div className="col-md-4">
                                          
                                        </div>
                                    </div>


                                    <h4 className='mb-4 text-start fs-5'>Social Media Links</h4>

                                    <div className="row form-row">
                                        <div className="col-md-2">
                                            <label htmlFor="">Facebook</label>
                                            <span className="spcol">:</span>
                                        </div>
                                        <div className="col-md-4">
                                            <Input type="text" name="facebook" placeholder="Enter Facebook URL" value={data.facebook}
                                                 handleChange={onHandleChange}  className={errors.facebook && 'inerror'}/>
                                                 {errors.facebook &&  <div className="smart-valid">{errors.facebook}</div> }
                                        </div>
                                        
                                        <div className="col-md-2">
                                            <label htmlFor="">Twitter</label>
                                                <span className="spcol">:</span>
                                            </div>
                                        <div className="col-md-4">
                                            <Input type="text" name="twitter" placeholder="Enter Twitter URL" value={data.twitter}
                                                 handleChange={onHandleChange}  className={errors.twitter && 'inerror'}/>
                                                 {errors.twitter &&  <div className="smart-valid">{errors.twitter}</div> }
                                        </div>
                                    </div>

                                    <div className="row form-row">
                                        <div className="col-md-2">
                                            <label htmlFor="">Pintrest</label>
                                            <span className="spcol">:</span>
                                        </div>
                                        <div className="col-md-4">
                                            <Input type="text" name="pintrest" placeholder="Enter Pintrest URL" value={data.pintrest}
                                                 handleChange={onHandleChange}  className={errors.pintrest && 'inerror'}/>
                                                 {errors.pintrest &&  <div className="smart-valid">{errors.pintrest}</div> }
                                        </div>
                                        
                                        <div className="col-md-2">
                                            <label htmlFor="">Instagram</label>
                                                <span className="spcol">:</span>
                                            </div>
                                        <div className="col-md-4">
                                            <Input type="text" placeholder="Enter Insagram URL" name="instagram" value={data.instagram}
                                                 handleChange={onHandleChange}  className={errors.instagram && 'inerror'}/>
                                                 {errors.instagram &&  <div className="smart-valid">{errors.instagram}</div> }
                                        </div>
                                    </div> 

                                    <div className="row form-row">
                                        <div className="col-md-2">
                                            <label htmlFor="">LinkedIn</label>
                                            <span className="spcol">:</span>
                                        </div>
                                        <div className="col-md-4">
                                            <Input type="text" placeholder="Enter LinkedIn URL" name="linkedin" value={data.linkedin}
                                                 handleChange={onHandleChange}  className={errors.linkedin && 'inerror'}/>
                                                 {errors.linkedin &&  <div className="smart-valid">{errors.linkedin}</div> }
                                        </div>
                                        
                                        <div className="col-md-2">
                                            <label htmlFor="">Youtube</label>
                                                <span className="spcol">:</span>
                                            </div>
                                        <div className="col-md-4">
                                            <Input type="text" placeholder="Enter Youtube URL" name="youtube" value={data.youtube}
                                                 handleChange={onHandleChange}  className={errors.youtube && 'inerror'}/>
                                                 {errors.youtube &&  <div className="smart-valid">{errors.youtube}</div> }
                                        </div>
                                    </div> 

                                    <div className="row mb-0 form-row">
                                        <div className="col-md-2">
                                          
                                        </div>
                                        <div className="col-md-4">
                                           
                                        </div>
                                        
                                        <div className="col-md-2">
                                            
                                        </div>
                                        <div className="col-md-4 text-end">
                                            <button className="btn btn-primary">Save Details</button>
                                        </div>
                                    </div> 

                                </form>
                            </div>
                            <div className="card-footer text-muted">
                                <div className="row">
                                    <div className="col-md-6 pt-2 left">
                                        <p>Step 7 of 7</p>
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
export default Timing