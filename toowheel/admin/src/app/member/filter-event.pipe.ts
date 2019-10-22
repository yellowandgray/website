import { Pipe, PipeTransform } from '@angular/core';
@Pipe({
   name: 'filterEventMember'
})
export class filterEventMember implements PipeTransform {
     transform(events: any[], value: string): any {
    if (events) {
      if (!value) {
        return events;
      } else {
        return events.filter(obj => obj.first_name.toLowerCase().indexOf(value.toLowerCase()) !== -1);
      }
    } else {
      return []
    }
  }
}