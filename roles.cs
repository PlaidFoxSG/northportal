using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace North
{
    #region Roles
    public class Roles
    {
        #region Member Variables
        protected unknown _id;
        protected string _name;
        protected string _guard_name;
        protected unknown _created_at;
        protected unknown _updated_at;
        #endregion
        #region Constructors
        public Roles() { }
        public Roles(string name, string guard_name, unknown created_at, unknown updated_at)
        {
            this._name=name;
            this._guard_name=guard_name;
            this._created_at=created_at;
            this._updated_at=updated_at;
        }
        #endregion
        #region Public Properties
        public virtual unknown Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Name
        {
            get {return _name;}
            set {_name=value;}
        }
        public virtual string Guard_name
        {
            get {return _guard_name;}
            set {_guard_name=value;}
        }
        public virtual unknown Created_at
        {
            get {return _created_at;}
            set {_created_at=value;}
        }
        public virtual unknown Updated_at
        {
            get {return _updated_at;}
            set {_updated_at=value;}
        }
        #endregion
    }
    #endregion
}